<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinReq extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'pet_name', 'species', 'breed', 'age', 'gender', 'altered', 'about', 'image', 'diagnosis', 'diagnosis_date', 'previous_diagnosis', 'vet_first_name', 'vet_last_name', 'primary_clinic_name', 'primary_clinic_phone', 'primary_clinic_email', 'specialist', 'other_help' 
    ];

    protected $casts = [
        'diagnosis_date' => 'date'
    ];

    /**
     * establish relationship to records
     */
    public function finReqRecord()
    {
        return $this->hasMany('App\Models\FinReqRecord');
    }

    /**
     * establish relationship to notes
     */
    public function finReqNote()
    {
        return $this->hasMany('App\Models\FinReqNote');
    }
}
