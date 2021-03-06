<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Donation;

use App\Models\CarePackage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class DonationTest extends TestCase
{
    /**
     * test donation success
     *
     * @return void
     */
    public function testMakeOneTimeDonation()
    {

        Mail::fake();

        // Create the Care Package instance using valid address
        $care_package = factory(CarePackage::class)->make();

        //build $data array
        $data = array(
            'firstName' => $care_package->first_name,
            'lastName' => $care_package->last_name,
            'email' => "baldmike312@gmail.com",
            'address1' => $care_package->address_1,
            'city' => $care_package->city,
            'state' => $care_package->state,
            'zip' => $care_package->zip,

            'petName' => $care_package->pet_name,
            'species' => $care_package->species,
            'about' => $care_package->about,
            'diagnosis' => $care_package->diagnosis
        );

        // hit API, assert donation made
        $response = $this->json('POST', '/api/care_pkgs', $data, );
        $response->assertStatus(201);
    }
}
