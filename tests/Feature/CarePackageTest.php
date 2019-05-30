<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\CarePackage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class CarePackageTest extends TestCase
{
    /**
     * test care package request success with VALID address
     *
     * @return void
     */
    public function testRequestCarePackage()
    {
        // Create the Care Package instance using valid address
        $care_package = factory(CarePackage::class)->make();

        //build $data array
        $data = array(
            'firstName' => $care_package->first_name,
            'lastName' => $care_package->last_name,
            'email' => $care_package->email,
            'address1' => $care_package->address_1,
            'city' => $care_package->city,
            'state' => $care_package->state,
            'zip' => $care_package->zip,

            'petName' => $care_package->pet_name,
            'species' => $care_package->species,
            'about' => $care_package->about,
            'diagnosis' => $care_package->diagnosis
        );

        // hit API, assert record created
        $response = $this->json('POST', '/api/care_pkgs', $data, );
        $response->assertStatus(201);
    }

    /**
     * test care package request success with INVALID address
     *
     * @return void
     */
    public function testRequestCarePackageInvalidAddress()
    {
        // Create the Care Package instance
        $care_package = factory(CarePackage::class)->make();

        //build $data array
        $data = array(
            'firstName' => $care_package->first_name,
            'lastName' => $care_package->last_name,
            'email' => $care_package->email,
            'address1' => "123 Wrong St.",
            'city' => "Wrongton Heights",
            'state' => "ZZ",
            'zip' => 10101,

            'petName' => $care_package->pet_name,
            'species' => $care_package->species,
            'about' => $care_package->about,
            'diagnosis' => $care_package->diagnosis
        );

        // hit API, assert validation error
        $response = $this->json('POST', '/api/care_pkgs', $data, );
        $response->assertStatus(400);
    }
}
