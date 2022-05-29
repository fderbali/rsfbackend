<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandUpdateRequest;
use App\Jobs\SendEmailJob;
use App\Mail\DemandUpdated;
use App\Models\Estimate;
use App\Models\Training;
use App\Models\User;

use App\Http\Requests\demandRequest;
use App\Models\Demand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DemandController extends Controller
{
    public function store(demandRequest $demandRequest) {
        $demand = demand::create($demandRequest->all());
        if($demand) {
            // Envoie email vers le prof qui fait la formation pour validation
            //Mail::to($demand->training->user->email)->send(new DemandCreated($demand));
            $details = [
                'recipient' => $demand->training->user->email,
                'model' => $demand,
                'class' => 'App\Mail\DemandCreated'
            ];
            dispatch(new SendEmailJob($details));
            return response()->json($demand);
        } else {
            return response()->json(["success"=>false]);
        }
    }

    public function index(){
        $demands = Demand::paginate(2);
        return response()->json($demands);
    }

    public function delete(Demand $demand) {
        $demand->delete();
        return response()->json(["success"=>true]);
    }

    public function update(DemandUpdateRequest $demandRequest, Demand $demand){
        $demand->update($demandRequest->except(['user_id']));
        if($demand) {
            if ($demand->status == "confirmed") {
                // On cée et on envoie le devis !
                $estimate = Estimate::create([
                    'demand_id' => $demand->id,
                    'price' => sprintf("%.2f", $demand->training->price * 1.15),
                    'status' => 'pending'
                ]);
                if ($estimate) {
                    Log::info($estimate);
                    $demand->estimate_id = $estimate->id;
                    $demand->save();
                    // send email
                    //Mail::to($demand->user->email)->send(new EstimateCreated($estimate));
                    $details = [
                        'recipient' => $demand->user->email,
                        'model' => $estimate,
                        'class' => 'App\Mail\EstimateCreated'
                    ];
                    dispatch(new SendEmailJob($details));
                }
            }
            else
            {
                // On informe le user que sa demandes est annulée par email
                // Mais si elle est confirmée, on l'informe dans le même e-mail qu'il va reçevoir pour le devis
                $details = [
                    'recipient' => $demand->user->email,
                    'model' => $demand,
                    'class' => 'App\Mail\DemandUpdated'
                ];
                dispatch(new SendEmailJob($details));
                //Mail::to($demand->user->email)->send(new DemandUpdated($demand));
            }
            return response()->json($demand);
        }
        return response()->json(["success"=>false]);
    }

    public function show(Demand $demand) {
        return response()->json($demand);
    }

    public function getDemandsByUser(User $user){
        return response()->json($user->demands->whereNull('estimate_id')->load('training','training.user'));
    }

    public function getDemandsByProf(User $user){
        $trainings = Training::WhereHas('demands')//,function($query){$query->where('status','initiated');})
            ->where('user_id', auth('sanctum')->user()->id)
            ->get()
            ->load(['demands', 'demands.user']);
        return response()->json($trainings);
    }
}

