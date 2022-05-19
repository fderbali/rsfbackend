<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Estimate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EstimateRequest;
class EstimateController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $estimates = Estimate::paginate(2);
        return response()->json($estimates);
    }

    public function store(EstimateRequest $estimateRequest): \Illuminate\Http\JsonResponse
    {
        $demand = demand::create( $estimateRequest->all());
        if($demand) {
            return response()->json($demand);
        }
        return response()->json(["success"=>false]);
    }

    public function show(Estimate $estimate): \Illuminate\Http\JsonResponse
    {
        return response()->json($estimate);
    }

    public function update(EstimateRequest $estimateRequest, Estimate $estimate): \Illuminate\Http\JsonResponse
    {
        $estimate->update($estimateRequest->all());
        return response()->json($estimate);
    }

    public function destroy(Estimate $estimate)
    {
        $estimate->delete();
        return response()->json(["success"=>true]);
    }

    public function getEstimatesByUser(User $user){
        return response()->json(Demand::Where('user_id', $user->id)->get()->load('estimate'));
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
