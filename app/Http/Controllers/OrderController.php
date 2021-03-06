<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Jobs\SendEmailJob;
use App\Mail\OrderCreated;
use App\Models\Estimate;
use App\Models\Order;
use App\Models\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        return Order::with('training', 'estimate')->get();
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
            //Mail::to($order->training->user->email)->send(new OrderCreated($order));
            $details = [
                'recipient' => $order->training->user->email,
                'model' => $order,
                'class' => 'App\Mail\OrderCreated'
            ];
            dispatch(new SendEmailJob($details));
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

    public function getOrdersByProf() {
        DB::connection()->enableQueryLog();
        $orders = Training::Where('user_id', auth('sanctum')->user()->id)
                            ->Wherehas('orders')
                            ->get()
                            ->load('orders')
                            ->load('orders.estimate.demand.user');
        $queries = DB::getQueryLog();
        Log::info($queries);
        return response()->json($orders);
    }
}
