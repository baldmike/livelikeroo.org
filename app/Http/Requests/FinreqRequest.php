<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class FinreqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Log::debug("INSIDE THE FIN REQ REQUEST");

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'pet_name' => 'required',
            'species' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'altered' => 'required',
            'about' => 'required',
            'previous_diagnosis' => 'required',
            'vet_first_name' => 'required',
            'vet_last_name' => 'required',
            'primary_clinic_name' => 'required',
            'primary_clinic_phone' => 'required',
        ];
    }
}
