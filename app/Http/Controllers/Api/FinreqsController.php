<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

use App\Http\Requests\FinReqRequest;
use App\Http\Resources\FinReqResource;

use App\Models\FinReq;
use App\Models\FinReqRecord;

use App\Events\FinRequestReceived;

class FinReqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FinReqResource::collection(FinReq::orderBy('created_at', 'asc')->get());
    }

    /**
     * Store the financical asisstance request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinReqRequest $request)
    {
        $validated = $request->validated();

        if($validated) 
        {
            $FinReq = new FinReq();

            $FinReq->first_name = request('firstName');
            $FinReq->last_name = request('lastName');
            $FinReq->email = request('email');
            $FinReq->address_1 = request('address1');
            $FinReq->address_2 = request('address2');
            $FinReq->city = request('city');
            $FinReq->state = request('state');
            $FinReq->zip = request('zip');
            $FinReq->pet_name = request('petName');
            $FinReq->species = request('species');
            $FinReq->breed = request('breed');
            $FinReq->age = request('age');
            $FinReq->gender = request('gender');
            $FinReq->altered = request('altered');
            $FinReq->about = request('about');
            $FinReq->diagnosis = request('diagnosis');
            $FinReq->diagnosis_date = request('diagnosisDate');
            $FinReq->previous_diagnosis = request('previousDiagnosis');
            $FinReq->vet_first_name = request('primaryVetFirstName');
            $FinReq->vet_last_name = request('primaryVetLastName');
            $FinReq->primary_clinic_name = request('primaryClinicName');
            $FinReq->primary_clinic_phone = request('primaryClinicPhone');
            $FinReq->primary_clinic_email = request('primaryClinicEmail'); 
            $FinReq->specialist = request('specialist');
            $FinReq->other_help = request('otherHelp');     

            // putFile creates a unique string name, saves file in 'storage/app/public/images', makes it public and returns the path that we'll concat onto our URL (on the front end) **** the third arg, 'public', is the visibility of resource
            if($request->hasFile('image'))
            {
                $path = Storage::putFile('public/images', $request->file('image'), 'public');

                // $path includes 'public/', and we don't want that in our URL, so we we chop it right off:
                $path = substr($path, 6);

                $FinReq->image = $path;
            }
    
            if($FinReq->save())
            {
                // Now save records to fin_req_records table
                $medRecord1 = Storage::putFile('public/records', $request->file('record1'), 'public');

                // $path includes 'public/', and we don't want that in our URL, so we we chop it right off:
                $medRecord1 = substr($medRecord1, 6);
                
                FinReqRecord::create([
                    'fin_req_id' => $FinReq->id,
                    'filename' => $medRecord1
                ]);
                
                // trigger an event to send mail
                event(new FinRequestReceived($FinReq));
                
                return new FinReqResource($FinReq);
            };

            // Financial assistance request did not save, return 417
            return response()->json(['message' => 'Assistance request did not save'], Response::HTTP_EXPECTATION_FAILED);

            
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
