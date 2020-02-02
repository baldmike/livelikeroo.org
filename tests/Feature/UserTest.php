<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testRegister()
    {
        // create random user with UserFactory
        $user = factory(User::class)->make();

        $this->userEmail = $user->email;
        
        //build $data array
        $data = array(
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => 'password',
            'role' => $user->role
        );

        // ************************************************************************************

        // hit API, assert record created
        $response = $this->json('POST', '/api/register', $data);
        $response->assertStatus(201);

        // delete user just created, verify
        $deleteUser = User::where('email', $user->email)->first();

        $deleteUser->forceDelete();

        $this->assertDatabaseMissing('users', [
            'email' => $user->email,
        ]);
    }

    /**
     * Tests the register api to confirm user cannot register with an existing email
     *
     * @return void
     */
    public function testRegistrationWithExistingEmail__fail()
    {
        // create random user, assign existing email
        $user = factory(User::class)->make();
        $user->email = User::all()->random()->email;

        $data = array(
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => $user->password,
            'role' => $user->role
        );

        // hit API, assert fail
        $response = $this->json('POST', '/api/register', $data);
        // assert server throws Unprocessable Entity
        $response->assertStatus(422);
    }

    /**
     * Tests the register api with incomplete form
     *
     * @return void
     */
    public function testRegisterMissingEmail__fail()
    {
        // create random user
        $user = factory(User::class)->make();
        $data = array(
            // 'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => $user->password,
            'role' => $user->role
        );

        // hit API, assert failure
        $response = $this->json('POST', '/api/register', $data);
        
        // assert server throws Unprocessable Entity
        $response->assertStatus(422);

        $this->assertContains("errors", $response->content());
        $this->assertContains("message", $response->content());
    }

    /**
     * Tests the register api with incomplete form
     *
     * @return void
     */
    public function testRegisterMissingPassword__fail()
    {
        // create random user
        $user = factory(User::class)->make();
        
        $data = array(
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            //'password' => $user->password,
            'role' => $user->role,
        );

        // hit API
        $response = $this->json('POST', '/api/register', $data);
        $json = json_decode($response->content());

        // dd($json);

        $response->assertStatus(422);

        $this->assertContains("errors", $response->content());
        $this->assertContains("message", $response->content());

    }

    /**
     * test login
     * 
     * @depends testRegister
     * 
     * @return void
     */
    public function testLogin($data)
    {
        $tokenData = array(
            'grant_type' => 'password',
            'email' => 'baldmike@example.com',
            'password' => 'password',
            'scope' => '',
        );
        
        $response = $this->json('POST', '/api/login', $tokenData);

        $response->assertStatus(200);
        $this->assertContains("Bald", $response->content());
        $this->assertContains("Mike", $response->content());
    }

    /**
     * test logout
     * 
     * @return void
     */
    public function testLogout()
    {
        $response = $this->json('POST', '/api/logout');

        $response->assertStatus(204);
    }

    // /**
    //  * clean up database
    //  * @return void
    //  */
    // public function testCleanUp($data)
    // {
    //     //convert to object to grab email from data array
    //     $object = (object) $data;
    //     $email = $object->email;

    //     // delete user just created, assert deletion
    //     $deleteUser = User::where('email', $email)->first();
    //     $deleteUser->forceDelete();
    //     $this->assertDatabaseMissing('users', [
    //         'email' => $email,
    //     ]);
    // }

}
