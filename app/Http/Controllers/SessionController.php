<?php

namespace App\Http\Controllers;

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
}
