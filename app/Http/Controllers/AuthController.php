<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest) {
        if(!Auth::attempt($loginRequest->only(["email", "password"]))){
            return response()->json(["success"=>false]);
        }
        else {
            $loginRequest->session()->regenerate();
            $user = Auth::user();
            return response()->json([
                'user' => $user
            ]);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
