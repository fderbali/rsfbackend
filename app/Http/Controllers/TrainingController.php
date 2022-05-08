<?php

namespace App\Http\Controllers;

use App\Http\Requests\trainingRequest;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function create(trainingRequest $trainingRequest) {
        /*if(
        Training::create([
            "title" => $trainingRequest->title,
            "description" => $trainingRequest->description,
            "thumbnail" => $trainingRequest->thumbnail,
            "level" => $trainingRequest->level,
            "location" => $trainingRequest->location,
            "user_id" => $trainingRequest->user_id,
            "category_id" => $trainingRequest->category_id,
            "total_duration" => $trainingRequest->total_duration
        ])) {
            return response()->json(["success"=>true]);
        }
        return response()->json(["success"=>false]);*/

        if(Training::create($trainingRequest->all())) {
            return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        }
    }
    public function index(){
        $trainings = Training::all();
        return response()->json($trainings);
    }

}