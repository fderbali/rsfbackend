<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

use App\Http\Requests\sessionRequest;
use App\Models\Session;

class SessionController extends Controller
{
    public function store(sessionRequest $sessionRequest) {

        if(session::create($sessionRequest->all())) {
            return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        }
    }

    public function index(){
        $sessions = Session::paginate(2);
        return response()->json($sessions);
    }

    public function delete(Session $session) {
        $session->delete();
        return response()->json(["success"=>true]);
    }

    public function update(sessionRequest $sessionRequest, Session $session){
        $session->update($sessionRequest->all());
        return response()->json(["success"=>true]);
    }

    public function show(Session $session) {
        return response()->json($session);
    }

    public function getCeduleByUser(){
        $sessions = Session::Where('user_id', auth('sanctum')->user()->id)
            ->orderBy('start', 'asc')
            ->get()
            ->load(['training','training.user']);
        return response()->json($sessions);
    }

    public function getCeduleByProf(){
        $trainings = Training::Where('user_id', auth('sanctum')->user()->id)
            ->whereHas('sessions')
            ->get()
            ->load(['sessions' => function($q) {
                $q->orderBy('start', 'asc');
            }, 'sessions.user']);
        return response()->json($trainings);
    }
}
