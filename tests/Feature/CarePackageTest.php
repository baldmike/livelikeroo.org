<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\CarePackage;

class CarePackageTest extends TestCase
{
    /**
     * test care package request
     *
     * @return void
     */
    public function testRequestCarePackage()
    {
        // Create the Care Package instance
        $care_package = factory(CarePackage::class)->make();

        //build $data array
        $data = array(
            'email' => $care_package->email,
            'first_name' => $care_package->first_name,
            'last_name' => $care_package->last_name,
            'address_1' => $care_package->streetAddress,
            'city' => $care_package->city,
            'state' => $care_package->state,
            'zip' => $care_package->postCode,


            
        );
    }
}
