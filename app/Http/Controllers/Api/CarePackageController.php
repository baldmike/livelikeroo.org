<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarePackageRequest;
use App\Http\Resources\CarePackageResource;

use App\Models\CarePackage;

use App\Mail\CarePackageConfirmation;

// use Mail;

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
        $validated = $request->validated();
        if($validated)
        {
            $CP = new CarePackage();

            $CP->first_name = request('firstName');
            $CP->last_name = request('lastName');
            $CP->email = request('email');
            $CP->address_1 = request('address1');
            $CP->address_2 = request('address2');
            $CP->city = request('city');
            $CP->state = request('state');
            $CP->zip = request('zip');
            $CP->pet_name = request('petName');
            $CP->about = request('about');
            $CP->diagnosis = request('diagnosis');
            $CP->sent = 0;
        }

        // putFile creates a unique string name, saves file in 'storage/app/public/images', makes it public and returns the path that we'll concat onto our URL on the front end
        if($request->hasFile('image'))
        {
            $path = Storage::putFile('public/images', $request->file('image'), 'public');

            // $path includes 'public/', and we don't want that in our URL, so we chop it off:
            $path = substr($path, 6);

            $CP->image = $path;
        }

        Mail::to($request->email)->send(new CarePackageConfirmation($CP));

        if ($CP->save()) {
            return response()->json(null, Response::HTTP_CREATED);
        };

        return response()->json(null, Response::HTTP_NOT_FOUND);

        
        
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
