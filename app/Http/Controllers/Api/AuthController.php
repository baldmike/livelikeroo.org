<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // check if email is in use
        $userExists = User::where('email', $request->username)->first();
        if ($userExists) 
        {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'This email is already registered, please login.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $verifyUser = User::where('email', $user->email)->first();

        if ($verifyUser) {
            return response()->json([
                'user' => $user,
                'message' => "{$user->name} successfully created.",
                'status' => Response::HTTP_CREATED,
            ], Response::HTTP_CREATED);
        }

        return response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => 'Unable to complete registration, please try again'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function login(Request $request)
    {
        
        // check if user exists
        $user = User::where('email', $request->email)->first();
        
        if (!$user)                  
        {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'This email is not registered, please register'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (!Hash::check(request('password'), $user->password)) {
            Log::debug("AuthController->login  **failed Hash::check");

            if (Hash::needsRehash($user->password) ){
                $hashed = Hash::make(request('password'));
            }

            return response()->json()([
                'message' => 'Incorrect email or password',
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
            
        } else {
            Log::info("AuthController->login: hash checked");
        }

        // gather data to get passport access_token
        $data = [
                'grant_type' => 'password',
                'client_id' => config('services.passport.client_id'),
                'client_secret' => config('services.passport.client_secret'),
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
        ];

        // Get access_token
        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()->handle($request);
    
        if ($response->getStatusCode() != 200) {
            Log::debug("AuthController - LOGIN FAILED");

            return response()->json([
                'message' => 'Incorrect email or password - maybe both, but at least one(1).',
                'status' => $response->getStatusCode(),
            ], $response->getStatusCode());
        }
        // unpack the response
        $responseData = json_decode($response->getContent());

        Auth::login($user);

        // set user
        $user = Auth::User();

        // set the token cookie
        $token_cookie = cookie(
            'tokenCookie',
            $responseData->access_token,
            null,
            null,
            null,
            true
        );

        // set the user cookie
        $user_cookie = cookie(
            'userCookie',
            $user,
            null,
            null,
            null,
            true
        );

        Cookie::queue($token_cookie);
        Cookie::queue($user_cookie);

        return response()->json([
            'user' => $user,
            'token' => $responseData->access_token,
            'expires_in' => $responseData->expires_in,
            'message' => "{$user->first_name} successfully logged in.",
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        if (Auth::user()) {

            // fetch user's ID
            $accessToken = Auth::user()->token()->id;
            $currentId = DB::table('oauth_access_tokens')->where('id', $accessToken)->first()->user_id;

            // if logged in, delete access token
            if ($currentId) {
                DB::table('oauth_access_tokens')
                    ->where('user_id', $currentId)
                    ->delete();
            }

            return response()->json([
                'message' => "You have successfully logged out.",
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        // return null
        return response()->json(null, 204);
    }
   
}