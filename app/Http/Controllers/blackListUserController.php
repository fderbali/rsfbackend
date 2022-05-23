<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklisteduser;
use App\Http\Requests\blackListUserRequest;

class blackListUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Blacklisteduser $Blacklisteduser ,blackListUserRequest $blackListUserRequest ) : \Illuminate\Http\JsonResponse
    {
        $Blacklisteduser = Blacklisteduser::create( $blackListUserRequest->all());
        if($Blacklisteduser) {
            return response()->json($Blacklisteduser);
        }
        return response()->json(["success"=>false]);
    }

       
    public function show(Blacklisteduser $Blacklisteduser): \Illuminate\Http\JsonResponse
    {
        return response()->json($Blacklisteduser);
    }
    
    public function update(blackListUserRequest $BlackListUserRequest, Blacklisteduser $BlackListUser) {
        $BlackListUser->update($BlackListUserRequest->all());
        return response()->json(["success"=>true]);
    }
    public function delete(Blacklisteduser $BlackListUser){
        $BlackListUser->delete();
        return response()->json(["success"=>true]);
    }
}
