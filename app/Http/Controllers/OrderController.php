<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderCreated;
use App\Models\Estimate;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::create( $request->only(['training_id', 'estimate_id', 'price']));
        if($order) {
            // Mise à jour du status du estimate
            $estimate = Estimate::find($request->estimate_id);
            $estimate->status = $request->status;
            $estimate->save();
            // Send mail to teacher to tell him that the payment was done !
            Mail::to($order->training->user->email)->send(new OrderCreated($order));
            return response()->json($order);
        }
        return response()->json(["success"=>false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderToReturn = Order::find($order->id)->load('training','estimate.demand.user');
        return response()->json($orderToReturn);
    }
}
