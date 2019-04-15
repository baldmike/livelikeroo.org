<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarePackage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'pet_name', 'species', 'about', 'diagnosis', 'image',            
    ];
}
