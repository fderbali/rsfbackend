<?php

namespace App\Http\Controllers;

use App\Http\Requests\trainingRequest;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function create(trainingRequest $trainingRequest) {

        return response()->json("ok");
    }
}
