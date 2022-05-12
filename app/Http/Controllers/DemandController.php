<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\demandRequest;
use App\Models\Demand;

class DemandController extends Controller
{
    public function store(demandRequest $demandRequest) {

        if(demand::create($demandRequest->all())) {
            return response()->json(["success"=>true]);
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

