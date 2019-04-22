<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinreqRequest;
use App\Http\Resources\FinreqResource;

use App\Models\Finreq;
use App\Mail\FinReqReceivedEmail;

use Mail;

class FinreqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FinreqResource::collection(Finreq::orderBy('created_at', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinreqRequest $request)
    {
        $validated = $request->validated();

        Log::debug("FinreqsController - store()");

        if($validated) 
        {
            Log::debug("[FINREQS CONTROLLER -- REQUEST IS VALIDATED");

            $Finreq = new Finreq();

            $Finreq->first_name = request('first_name');
            $Finreq->last_name = request('last_name');
            $Finreq->email = request('email');
            $Finreq->address_1 = request('address_1');
            $Finreq->address_2 = request('address_2');
            $Finreq->city = request('city');
            $Finreq->state = request('state');
            $Finreq->zip = request('zip');
            $Finreq->pet_name = request('pet_name');
            $Finreq->species = request('species');
            $Finreq->breed = request('breed');
            $Finreq->age = request('age');
            $Finreq->gender = request('gender');
            $Finreq->altered = request('altered');
            $Finreq->about = request('about');
            $Finreq->diagnosis = request('diagnosis');
            $Finreq->diagnosis_date = request('diagnosis_date');
            $Finreq->previous_diagnosis = request('previous_diagnosis');
            $Finreq->vet_first_name = request('vet_first_name');
            $Finreq->vet_last_name = request('vet_last_name');
            $Finreq->primary_clinic_name = request('primary_clinic_name');
            $Finreq->primary_clinic_phone = request('primary_clinic_phone');
            $Finreq->primary_clinic_fax = request('primary_clinic_fax');
            $Finreq->primary_clinic_email = request('primary_clinic_email'); 
            $Finreq->specialist = request('specialist');
            $Finreq->other_help = request('other_help');     

            // putFile creates a unique string name, saves file in 'storage/app/public/images', makes it public and returns the path that we'll concat onto our URL (on the front end)
            if($request->hasFile('image'))
            {
                $path = Storage::putFile('public/images', $request->file('image'), 'public');

                // $path includes 'public/', and we don't want that in our URL, so we we chop it off:
                $path = substr($path, 6);

                Log::debug("[FinreqsController] - store - SUBSTRING path:");
                Log::debug($path);

                $Finreq->image = $path;
            }
    
            $Finreq->save();

            // SEND CONFIRMATION EMAIL
            Mail::to('baldmike312@gmail.com')->send(new FinReqReceivedEmail($Finreq));
            
            
            
            return new FinreqResource($Finreq);
        }
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
