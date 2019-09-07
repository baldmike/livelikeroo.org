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

    /**
     * Return the shipping data for a user
     * 
     * @return array
     */
    public function shippingAddress()
    {
        $name = $this->first_name . ' ' . $this->last_name;

        return [
            'name' => $name,
            'company' => '',
            'street1' => $this->address_1,
            'street2' => $this->address_2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => 'US',
            'phone' => '',
            'email' => $this->email,
            
        ];
    }

    /**
     * Return our from address
     * 
     * @return array
     */
    public function fromAddress()
    {
        return [
            'name' => 'Sarah Lauch',
            'company' => 'Live Like Roo',
            'street1' => '5830 N Melvina',
            'street2' => '',
            'city' => 'Chicago',
            'state' => 'IL',
            'zip' => '60646',
            'country' => 'US',
            'phone' => '',
            'email' => 'sarah@livelikeroo.org',
            
        ];
    }  
}
