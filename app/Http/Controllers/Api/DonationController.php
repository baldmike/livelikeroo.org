<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\MonthlyDonationRequest;
use App\Http\Requests\OneTimeDonationRequest;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Support\Str;

use App\Models\Donation;
use App\Models\User;

use App\Events\OneTimeDonationMade;
use App\Events\InMemorySelected;
use App\Events\MonthlyDonationMade;

class DonationController extends Controller
{
    /**
     * handle a one-time donation with Stripe
     *
     */
    public function oneTime(OneTimeDonationRequest $request)
    {
        // validate the request
        $validated = $request->validated();

        // find or create the user
        $user = User::where('email', $request->email)->first();
                
        // if user doens't exist, make a user with the role 'donor'
        if (!$user)
        {
            $uuid = Str::uuid()->toString();

            $user = User::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'password' => $uuid,
                'role' => 'donor',
            ]);
        }

        if($validated) 
        {
            // use try/catch for the Stripe call
            try {
                // create the charge with Stripe
                $charge = Stripe::charges()->create([
                    'amount' => $request->amount,
                    'currency' => 'USD', 
                    'source' => $request->stripeToken,
                    'description' => 'One-Time Donation to Live Like Roo',
                    'receipt_email' => $request->email,
                    'metadata' => [
                        'name_on_card' => $request->name_on_card,
                        'data2' => 'metadata 2',
                        'data3' => 'metadata 3',
                    ],
                ]);

            } catch (CardErrorException $e) {
                // handle exception 
                return back()->withErrors('There was an error with Stripe: ' . $e->getMessage());
            }

            // Stripe call successful

            // instantiate a new Donation
            $d = New Donation();
            $d->amount = request('amount');
            $d->name_on_card = request('name_on_card');
            $d->first_name = request('firstName');
            $d->last_name = request('lastName');
            $d->email = request('email');
            $d->frequency = 'one-time';
            $d->fund = request('fund');
            $d->in_memory = request('inMemory');
            $d->honoree = request('honoreeName');
            $d->recipient_name = request('recipientName');
            $d->recipient_email = request('recipientEmail');
            $d->recipient_msg = request('recipientMessage');

            // make sure new Donation is saved
            if ($d->save())
            {
                // if donation is made "in memory" trigger the event that emails recipient
                if (request('inMemory'))
                {    
                    event(new InMemorySelected($d));
                }

                // trigger donation event which sends email
                event(new OneTimeDonationMade($d));

                // everything went well, return 201
                return response()->json(null, Response::HTTP_CREATED);
            }
        
            // Donation did not save, return 417
            Log::debug(('[DONATION CONTROLLER] --> Donation did not save -- return 417'));
            return response()->json(null, Response::HTTP_EXPECTATION_FAILED);
        }

        // The resource is not validated, return 400
        Log::debug(('[DONATION CONTROLLER] --> Resource not validated -- return 400'));
        return response()->json(null, Response::HTTP_BAD_REQUEST);
    }

    /**
     * set up monthly donations with Stripe and Cashier
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function monthly(MonthlyDonationRequest $request)
    {
        $validated = $request->validated();

        // find or create the user
        $user = User::where('email', $request->email)->first();

        if($user) {
            if($user->role === 'donor')
            {
                $user->role = "monthly_donor";
                $user->save();
            }
        }
        
        // if user doens't exist, make a user with the role 'monthly_donor'
        if (!$user)
        {
            $user = User::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'monthly_donor',
            ]);
        }

        if($validated) 
        {
            try {
                // get the token from the request (Vue gets the token in initial request), Laravel Cashier sends to Stripe
                $stripeToken = $request->stripeToken;
                $donationAmount = $request->amount;

                // Laravel Cashier
                $user->newSubscription('LLR', 'plan_EekQCaDTMtweIE')->quantity($donationAmount)->create($stripeToken);
                
                } catch (CardErrorException $e) {
                
                return back()->withErrors('Error! ' . $e->getMessage());
            }

            // subscription successful, instantiate new donation
            $d = New Donation();
            $d->amount = request('amount');
            $d->name_on_card = request('name_on_card');
            $d->first_name = request('first_name');
            $d->last_name = request('last_name');
            $d->email = request('email');
            $d->in_memory = request('inMemory');
            $d->frequency = 'monthly';
            $d->honoree = request('honoreeName');
            $d->recipient_name = request('recipientName');
            $d->recipient_email = request('recipientEmail');
            $d->recipient_msg = request('recipientMessage');
            $d->fund = request('fund');
            
            // save the donation
            if ($d->save())
            {
                // if donation is made "in memory" trigger the event that emails recipient
                if (request('inMemory'))
                {    
                    event(new InMemorySelected($d));
                }

                event(new MonthlyDonationMade($d, $user));
            
                // everything went well, return 201
                return response()->json(null, Response::HTTP_CREATED);
            }
        
            // Donation did not save, return 417
            return response()->json(null, Response::HTTP_EXPECTATION_FAILED);
        }

        // The resource is not validated, return 400
        return response()->json(null, Response::HTTP_BAD_REQUEST);
    }
}