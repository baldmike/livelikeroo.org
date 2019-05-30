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
    /**
     * test registration 
     * 
     * @return $data
     */
    public function testRegister()
    {
        Mail::fake();

        // create random user with UserFactory
        $user = factory(User::class)->make();
        
        //build $data array
        $data = array(
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => 'password',
            'role' => $user->role,
        );

        // hit API, assert record created
        $response = $this->json('POST', '/api/register', $data);
        $response->assertStatus(201);

        return $data;
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
        $response = $this->json('POST', '/api/login', $data);
        $response->assertStatus(200);
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

    /**
     * 
     * clean up database
     * 
     * @depends testRegister
     * 
     * @return void
     */
    public function testCleanUp($data)
    {
        //convert to object to grab email from data array
        $object = (object) $data;
        $email = $object->email;

        // delete user just created, assert deletion
        $deleteUser = User::where('email', $email)->first();
        $deleteUser->forceDelete();
        $this->assertDatabaseMissing('users', [
            'email' => $email,
        ]);
    }

}
