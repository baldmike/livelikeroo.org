<?php
namespace App\Services;
use Shippo;
use App\Models\User;
use App\Models\CarePackage;

use Shippo_Address;
use Shippo_Shipment;
use Shippo_Transaction;

class Shipping 
{
    protected $fromAddress = [
        'name' => 'Sarah Lauch',
        'company' => 'Live Like Roo',
        'street1' => '5830 N Melvina',
        'city' => 'Chicago',
        'state' => 'IL',
        'zip' => '60646',
        'country' => 'US',
    ];

    public $parcel = [
        'length'=> '12',
        'width'=> '12',
        'height'=> '12',
        'distance_unit'=> 'in',
        'weight'=> '5',
        'mass_unit'=> 'lb'
    ];

    public function __construct()
    {
        // fetch shippo api key from .env
        Shippo::setApiKey(env('SHIPPO_KEY'));
    }
    
    /**
     * Validate an address through Shippo service
     *
     * @param CarePackage $user
     * @return Shippo_Address
     */
    public function validateAddress(Array $toAddress)
    {

        // Pass a validate flag to Shippo
        $toAddress['validate'] = true;
        // Verify the address data
        return Shippo_Address::create($toAddress);
    }
    
    /**
     * Create a Shippo shipping rates
     *
     * @return Shippo_Shipment
     */
    public function createShipment(Array $toAddress)
    {   
        // Get the shipment object
        return Shippo_Shipment::create([
                'address_from'=> $this->fromAddress,
                'address_to'=> $toAddress,
                'parcels'=> $this->parcel,
                'async'=> false
        ]);
    }
    
    /**
     * Create the shipping label transaction
     *
     * @return Shippo_Transaction
     */
    public function createLabel($shipment)
    {

        return Shippo_Transaction::create([
            'shipment' => $shipment,
            'carrier_account' => 'c48be54b2f71475187f79b5dab7d4f30',
            'servicelevel_token' => 'usps_priority',
            'label_file_type' => "PDF",
            'async' => false
        ]);
    }
}