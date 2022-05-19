<?php

namespace App\Http\Controllers;

use App\Http\Requests\announceRequest;
use App\Models\Announce;
use Illuminate\Http\Request;


class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $Announce = Announce::paginate(2);
        return response()->json($Announce);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(announceRequest $announceRequest){
        $Announce = Announce::create($announceRequest->all());
      
        if($Announce) {return response()->json(["success"=>true]);
        } else {
            return response()->json(["success"=>false]);
        }
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announce $Announce)
    {
        return response()->json($Announce);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(announceRequest $announceRequest, Announce $Announce) {
        $Announce->update($announceRequest->all());
        return response()->json(["success"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Announce $Announce){
        $Announce->delete();
        return response()->json(["success"=>true]);
    }
}
