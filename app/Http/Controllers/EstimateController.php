<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstimateUpdateRequest;
use App\Jobs\SendEmailJob;
use App\Models\Demand;
use App\Models\Estimate;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EstimateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::connection()->enableQueryLog();
        $estimate = Demand::Where('estimate_id', $estimate->id)
            ->first()
            ->load('estimate','training', 'training.user');
        $queries = DB::getQueryLog();
        Log::info($queries);
        return response()->json($estimate);
    }

    public function update(EstimateUpdateRequest $estimateRequest, Estimate $estimate): \Illuminate\Http\JsonResponse
    {
        $estimate->update($estimateRequest->only(['status']));
        $details = [
            'recipient' => $estimate->demand->training->user->email,
            'model' => $estimate,
            'class' => 'App\Mail\EstimateUpdated'
        ];
        dispatch(new SendEmailJob($details));
        return response()->json($estimate);
    }

    public function destroy(Estimate $estimate)
    {
        $estimate->delete();
        return response()->json(["success"=>true]);
    }

    public function getEstimatesByUser(User $user){
        DB::connection()->enableQueryLog();
        $estimates = Demand::Where('user_id', $user->id)
                             ->whereNotNull('estimate_id')
                             ->get()
                             ->load('estimate','training','training.user');
        $queries = DB::getQueryLog();
        Log::info($queries);
        return response()->json($estimates);
    }

    public function getEstimatesByProf(User $user) {
        DB::connection()->enableQueryLog();
        $trainings = Training::WhereHas('demands', function($query){$query->whereNotNull('estimate_id');})
                               ->where('user_id', $user->id)
                               ->get()
                               ->load(['demands' => function($query) {
                                   $query->whereNotNull('estimate_id');
                               }, 'demands.user','demands.estimate','demands.training']);
        $queries = DB::getQueryLog();
        Log::info($queries);
        return response()->json($trainings);
    }
}
