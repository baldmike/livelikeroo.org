<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Shippo;
use Shippo_Transaction;
use Shippo_Address;

use Illuminate\Support\Facades\Log;

use App\Events\CarePackageBuyLabel;


class BuyCarePackageLabel
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
    public function handle(CarePackageBuyLabel $event)
    {   
        $toAddress = $event->carePackage->shippingAddress();
        $carrierAccount = config('services.shippo.carrier_account');

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
            'carrier_account' => $carrierAccount,
            'servicelevel_token' => 'usps_priority',
            'label_file_type' => "PDF",
            'async' => false,
        ));

        if ($transaction["object_status"] === "ERROR") {
            return back()->withMessage($transaction["messages"]);
        }

        $url = $transaction->label_url;
        $tracking_number = $transaction->tracking_number;
        $tracking_url_provider = $transaction->tracking_url_provider;
        $shipping_id = $transaction->object_id;

        $event->carePackage->label_url = $url;
        $event->carePackage->tracking_number = $tracking_number;
        $event->carePackage->tracking_url_provider = $tracking_url_provider;
        $event->carePackage->shipping_id = $shipping_id;

        $event->carePackage->save();
    }
}
