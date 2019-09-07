<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class FinReqRequest extends FormRequest
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
        $rules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'petName' => 'required',
            'species' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'altered' => 'required',
            'about' => 'required',
            'previousDiagnosis' => 'required',
            'primaryVetFirstName' => 'required',
            'primaryVetLastName' => 'required',
            'primaryClinicName' => 'required',
        ];

        return $rules;
    }
}
