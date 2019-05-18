<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Shippo;
use Shippo_Transaction;

use Illuminate\Support\Facades\Log;

use App\Events\CarePackageSent;
use App\Services\Shipping;

class SendCarePackage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Shipping $shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * 
     */
    public function handle(CarePackageSent $event)
    {   
        Shippo::setApiKey(config('services.shippo.shippo_key'));

        $toAddress = $event->carePackage->shippingAddress();

        Log::debug($toAddress);


        // use below with the Shipping Class
        // $validated = $this->shipping->validateAddress($toAddress);
        // $shipment = $this->shipping->createShipment($toAddress);
        // $transaction = $this->shipping->createLabel($shipment);
        // Log::debug("[SEND CARE PACKAGE EVENT LISTENER] - create label");

        $fromAddress = array(
            'name' => 'Sarah Lauch',
            'company' => 'Live Like Roo',
            'street1' => '5830 N Melvina',
            'city' => 'Chicago',
            'state' => 'IL',
            'zip' => '60646',
            'country' => 'US',
        );

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
        ));

        // If it failed then redirect back and tell them whats wrong
        if ($transaction["object_status"] != "SUCCESS"){
            return back()->withMessage($transaction["messages"]);
        }

        Log::debug("[TRANSACTION] ------>");
        Log::debug($transaction);

        $event->carePackage->sent = true;
        $event->carePackage->save();    

        $url = $transaction->label_url;

        return redirect()->to('https://www.google.com');
    }
}
