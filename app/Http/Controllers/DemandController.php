<?php

namespace App\Http\Controllers;

use App\Mail\DemandCreated;
use App\Mail\DemandUpdated;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests\demandRequest;
use App\Models\Demand;
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

    public function update(demandRequest $demandRequest, Demand $demand){
        $demand->update($demandRequest->all());
        if($demand){
            Mail::to($demand->user->email)->send(new DemandUpdated($demand));
            return response()->json($demand);
        }
        return response()->json(["success"=>false]);
    }

    public function show(Demand $demand) {
        return response()->json($demand);
    }

    public function getDemandsByUser(User $user){
        return response()->json($user->demands);
    }

    public function getDemandsByProf(User $user){
        $trainings = $user->trainings;
        $demands = new Collection();
        foreach ($trainings as $training){
            $demands = $demands->merge($training->demands);
        }
        return response()->json($demands);
    }
}

