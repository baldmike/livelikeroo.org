<?php
namespace App\Services;
use Shippo;
use App\User;
use App\CarePackage;

use App\Product;

use Shippo_Address;
use Shippo_Shipment;
use Shippo_Transaction;
class Shipping 
{
    protected $fromAddress = [
        'name' => 'Sarah',
        'company' => 'Live Like Roo',
        'city' => 'Chicago',
        'state' => 'IL',
        'country' => 'US',
    ];

    public function __construct()
    {
        // fetch shippo api key from .env
        Shippo::setApiKey(env('SHIPPO_OOPIE'));
    }
    
    /**
     * Validate an address through Shippo service
     *
     * @param CarePackage $user
     * @return \Shippo_Address
     */
    public function validateAddress(CarePackage $care_package)
    {

        // Grab the shipping address from the Care Package model
        $toAddress = $care_package->shippingAddress();
        // Pass a validate flag to Shippo
        $toAddress['validate'] = true;
        // Verify the address data
        return Shippo_Address::create($toAddress);
    }
    
    /**
     * Create a Shippo shipping rates
     *
     * @param User $user
     * @param Product $product
     * @return Shippo_Shipment
     */
    public function rates(User $user, Product $product)
    {
        // Grab the shipping address from the User model
        $toAddress = $user->shippingAddress();
        
        // Get the shipment object
        return Shippo_Shipment::create([
                'address_from'=> $this->fromAddress,
                'address_to'=> $toAddress,
                'parcel'=> $product->toArray(),
                'insurance_amount'=> '30',
                'insurance_currency'=> 'USD',
                'async'=> false
        ]);
    }
    
    /**
     * Create the shipping label transaction
     *
     * @param $rateId -- object_id from rates_list
     * @return Shippo_Transaction
     */
    public function createLabel($rateId)
    {
        return Shippo_Transaction::create([
            'rate' => $rateId,
            'label_file_type' => "PDF",
            'async' => false
        ]);
    }
}