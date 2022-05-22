<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $loginRequest) {
        if(!Auth::attempt($loginRequest->only(["email", "password"]))){
            return response()->json(["success"=>false], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        else {
            $loginRequest->session()->regenerate();
            $user = Auth::user();
            $jwt = $user->createToken('token')->plainTextToken;
            $cookie = cookie('jwt', $jwt, 60);
            return response()->json([
                'user' => $user,
                'jwt' => $jwt
            ])->withCookie($cookie);
        }
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $cookie = Cookie::forget('jwt');
        return response()->json([
            "success" => true
        ])->withCookie($cookie);
    }
    public function create(UserRequest $request){
        $user = User::create([
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "birth_date"=>$request->birth_date,
            "address"=>$request->address,
            "city"=>$request->city,
            "zip_code"=>$request->zip_code,
            "country"=>$request->country,
            "password"=> Hash::make($request->password)
        ]);
        if($user) {
            return response()->json(["success"=>true]);
        }
    }
}
