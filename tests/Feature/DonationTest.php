<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Donation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class DonationTest extends TestCase
{
    /**
     * test care package request success with VALID address
     *
     * @return void
     */
    public function testMakeDonation()
    {
        // // Create the Care Package instance using valid address
        // $donation = factory(Donation::class)->make();

        // //build $data array
        // $data = array(
        //     'fund' => $donation->fund,
        //     'amount' => $donation->amount,
        //     'in_memory' => $donation->in_memory,
        //     'frequency' => $donation->frequency,
        //     'honoree' => $donation->honoree,
        //     'recipient_name' => $donation->recipient_name,
        //     'recipient_email' => $donation->recipient_email,
        //     'recipient_msg' => $donation->recipient_msg,

        //     'firstName' => $donation->first_name,
        //     'lastName' => $donation->last_name,
        //     'email' => $donation->email,
        //     'name_on_card' => $donation->name_on_card
        // );

        // // hit API, assert record created
        // $response = $this->json('POST', '/api/make_donation', $data, );
        // $response->assertStatus(201);
    }
}
