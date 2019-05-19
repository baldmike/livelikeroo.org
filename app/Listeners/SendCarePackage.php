<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Shippo;
use Shippo_Transaction;
use Shippo_Address;

use Illuminate\Support\Facades\Log;

use App\Events\CarePackageSent;


class SendCarePackage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        Shippo::setApiKey(config('services.shippo.shippo_key'));
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * 
     */
    public function handle(CarePackageSent $event)
    {   
        $toAddress = $event->carePackage->shippingAddress();

        Log::debug("[SendCarePackage] -> BEFORE validation--> ");

        $fromAddress = Shippo_Address::create(array(
            'name' => 'Sarah Lauch',
            'company' => 'Live Like Roo',
            'street1' => '5830 N Melvina',
            'city' => 'Chicago',
            'state' => 'IL',
            'zip' => '60646',
            'country' => 'US',
            'email' => 'sarah@livelikeroo.org',
            'validate' => true,
        ));

        Log::debug("[SendCarePackage] -> AFTER validation--> ");

        $parcel = array(
            'length'=> '5',
            'width'=> '5',
            'height'=> '5',
            'distance_unit'=> 'in',
            'weight'=> '2',
            'mass_unit'=> 'lb',
        );

        $shipment = array(
            'address_from'=> $fromAddress,
            'address_to'=> $toAddress,
            'parcels'=> array($parcel),
        );

        $transaction = Shippo_Transaction::create( array(
            'shipment' => $shipment,
            'carrier_account' => 'c48be54b2f71475187f79b5dab7d4f30',
            'servicelevel_token' => 'usps_priority',
            'label_file_type' => "PDF",
            'async' => false,
        ));

        if ($transaction["object_status"] === "ERROR") {
            return back()->withMessage($transaction["messages"]);
        }

        Log::debug("[TRANSACTION] ------>");
        Log::debug($transaction);

        $url = $transaction->label_url;
        
        $event->carePackage->sent = true;         
        $event->carePackage->label_url = $url;
        
        $event->carePackage->save();
    }
}
