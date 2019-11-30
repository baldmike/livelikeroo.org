<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;

use Shippo_Address;
use Shippo;

use App\Models\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(Orer::orderBy('created_at', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // Validate the address with Shippo
        Shippo::setApiKey(config('services.shippo.shippo_key'));
        $shippingName = request('firstName') . request('lastName');        

        $toAddress = Shippo_Address::create( array(
            "name" => $shippingName,
            "company" => "OR",
            "street1" => request('address1'),
            "city" => request('city'),
            "state" => request('state'),
            "zip" => request('zip'),
            "country" => "US",
            "email" => request('email'),
            "validate" => true
        ));

        if($toAddress->validation_results->is_valid)
        {
            $validated = $request->validated();
            if($validated)
            {
                $order = new Order();

                $order->first_name = request('firstName');
                $order->last_name = request('lastName');
                $order->email = request('email');
                $order->address_1 = request('address1');
                $order->address_2 = request('address2');
                $order->city = request('city');
                $order->state = request('state');
                $order->zip = request('zip');
                $order->quantity = request('quantity');
                
            }

            if ($order->save()) 
            {
                return response()->json(['message' => 'Order successfully made'], Response::HTTP_CREATED);
            };

            // Order did not save, return 417
            return response()->json(['message' => 'Order did not save'], Response::HTTP_EXPECTATION_FAILED);
        }

        return response()->json(['message' => 'Invalid shipping address'], Response::HTTP_BAD_REQUEST);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
