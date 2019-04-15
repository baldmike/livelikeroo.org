<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finreq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'phone', 'pet_name', 'species', 'breed', 'age', 'gender', 'altered', 'about', 'diagnosis', 'diagnosis_date', 'previous_diagnosis', 'vet_first_name', 'vet_last_name', 'primary_clinic_name', 'primary_clinic_phone', 'primary_clinic_fax', 'primary_clinic_email', 'primary_clinic_address', 'primary_clinic_city', 'primary_clinic_state', 'primary_clinic_zip'   
    ];
}
