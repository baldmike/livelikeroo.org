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
        'first_name', 'last_name', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'pet_name', 'about', 'diagnosis', 'image', 'sent'
    ];

    public function sent($query)
    {
        return $query->where('sent', 1);
    }

    public function unsent($query)
    {
        return $query->where('sent', 0);
    }

    /**
     * Return the shipping data for a user
     * 
     * @return array
     */
    public function shippingAddress()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'email' => $this->email,
        ];
    }
    
}
