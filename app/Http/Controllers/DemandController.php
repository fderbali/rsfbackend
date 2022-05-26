<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandUpdateRequest;
use App\Mail\DemandCreated;
use App\Mail\DemandUpdated;
use App\Mail\EstimateCreated;
use App\Models\Estimate;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
            Mail::to($demand->training->user->email)->send(new DemandCreated($demand));
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
        $demand->update($demandRequest->all());
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
                    Mail::to($demand->user->email)->send(new EstimateCreated($estimate));
                }
            }
            else
            {
                // On informe le user que sa demandes est annulée par email
                // Mais si elle est confirmée, on l'informe dans le même e-mail qu'il va reçevoir pour le devis
                Mail::to($demand->user->email)->send(new DemandUpdated($demand));
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

