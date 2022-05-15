<?php

namespace App\Http\Controllers;

use App\Mail\DemandCreated;
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
        return response()->json(["success"=>true]);
    }

    public function show(Demand $demand) {
        return response()->json($demand);
    }

}

