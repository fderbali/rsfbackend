<?php

namespace App\Http\Controllers;

use App\Http\Requests\trainingRequest;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function store(trainingRequest $trainingRequest) {
        $imageName = time().'.'.$trainingRequest->thumbnail->extension();
        $trainingRequest->thumbnail->move(public_path('images'), $imageName);

        if(Training::create([
            "title" => $trainingRequest->title,
            "description" => $trainingRequest->description,
            "thumbnail" => $imageName,
            "level" => $trainingRequest->level,
            "location" => $trainingRequest->location,
            "user_id" => $trainingRequest->user_id,
            "category_id" => $trainingRequest->category_id,
            "total_duration" => $trainingRequest->total_duration,
            "price" => $trainingRequest->price
        ])) {
            return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        }
    }
    public function index(){
        $trainings = Training::with('user')->paginate(4);
        return response()->json($trainings);
    }
    public function delete(Training $training) {
        $training->delete();
        return response()->json(["success"=>true]);
    }
    public function update(trainingRequest $trainingRequest, Training $training){
        $training->update($trainingRequest->all());
        return response()->json(["success"=>true]);
    }

    public function show(Training $training) {
        return response()->json($training);
    }

}
