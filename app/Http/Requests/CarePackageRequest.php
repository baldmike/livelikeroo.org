<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Http\FormRequest;

class CarePackageRequest extends FormRequest
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
        Log::debug("INSIDE THE CARE PKG REQUEST RULES");

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'pet_name' => 'required',
            'about' => 'required',
        ];
    }
}
