<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Http\FormRequest;

class oneTimeDonationRequest extends FormRequest
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
        return [
            'amount' => 'required',
            'fund' => 'required|string|max:50',
            'email' => 'required',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'name_on_card' => 'required',
            'stripeToken' => 'required',
        ];
    }
}
