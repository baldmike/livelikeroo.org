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
        $validated = $request->validated();
        if($validated)
        {
            $CP = new CarePackage();

            $CP->first_name = request('first_name');
            $CP->last_name = request('last_name');
            $CP->email = request('email');
            $CP->address_1 = request('address_1');
            $CP->address_2 = request('address_2');
            $CP->city = request('city');
            $CP->state = request('state');
            $CP->zip = request('zip');
            $CP->pet_name = request('pet_name');
            $CP->about = request('about');
            $CP->image = request('image');
            $CP->diagnosis = request('diagnosis');
        }

        // putFile creates a unique string name, saves file in 'storage/app/public/images', makes it public and returns the path that we'll concat onto our URL (on the front end)
        if($request->hasFile('image'))
        {
            $path = Storage::putFile('public/images', $request->file('image'), 'public');

            // $path includes 'public/', and we don't want that in our URL, so we we chop it off:
            $path = substr($path, 6);

            Log::debug("[CarePackageController] - store - SUBSTRING path:");
            Log::debug($path);

            $CP->image = $path;
        }

        Mail::to('baldmike312@gmail.com')->send(new CarePackageConfirmation($CP));

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
        //
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
