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

    public function store(blackListUserRequest $Blacklisteduser) {

        $Blacklist = Blacklisteduser::create($Blacklisteduser->all());
      
        if($Blacklist) {return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        } 




        if(Blacklisteduser::create([
           'email'=>$Blacklisteduser->email,
         ])) 
        {
        return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        }
    }
    // public function show(Blacklisteduser $Blacklisteduser) {
    //     return response()->json(["success03"=>true]);
    //    } 

       
    public function show(Blacklisteduser $Blacklisteduser): \Illuminate\Http\JsonResponse
    {
        return response()->json($Blacklisteduser);
    }
    


}
