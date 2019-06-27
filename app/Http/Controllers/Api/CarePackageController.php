<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarePackageRequest;
use App\Http\Resources\CarePackageResource;

use App\Models\CarePackage;

use App\Mail\CarePackageConfirmation;
use Shippo_Address;
use Shippo;
use Mail;

class CarePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarePackageResource::collection(CarePackage::orderBy('created_at', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarePackageRequest $request)
    {
        // first, validate the address with Shippo
        Shippo::setApiKey(config('services.shippo.shippo_key'));
        $shippingName = request('firstName') . request('lastName');        

        $toAddress = Shippo_Address::create( array(
            "name" => $shippingName,
            "company" => "CP",
            "street1" => request('address1'),
            "city" => request('city'),
            "state" => request('state'),
            "zip" => request('zip'),
            "country" => "US",
            "email" => request('email'),
            "validate" => true
        ));

        if(!$toAddress->validation_results->is_valid)
        {
                return response()->json(['message' => 'Invalid shipping address'], 400);
        }

        if($toAddress->validation_results->is_valid)
        {
            $validated = $request->validated();
            if($validated)
            {
                $cp = new CarePackage();

                $cp->first_name = request('firstName');
                $cp->last_name = request('lastName');
                $cp->email = request('email');
                $cp->address_1 = request('address1');
                $cp->address_2 = request('address2');
                $cp->city = request('city');
                $cp->state = request('state');
                $cp->zip = request('zip');
                $cp->pet_name = request('petName');
                $cp->about = request('about');
                $cp->diagnosis = request('diagnosis');
                $cp->sent = 0;
            }
        
            // putFile creates a unique string name, saves file in 'storage/app/public/images', makes it public and returns the path that we'll concat onto our URL on the front end
            if($request->hasFile('image'))
            {
                $path = Storage::putFile('public/images', $request->file('image'), 'public');

                // $path includes 'public/', and we don't want that in our URL, so we chop it off:
                $path = substr($path, 6);

                $cp->image = $path;
            }

            if ($cp->save()) 
            {
                // *TODO* move to an event
                Mail::to($request->email)->send(new CarePackageConfirmation($cp));
                return response()->json(['message' => 'Care Package Request successfully made.'], 201);
                
            };
        }

        return response()->json(['message' => 'General Server Error.'], 500);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
