<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;



class UsersController extends Controller
{
    /**
     *
     * @return \App\Models\User
    */
    public function current()
    {
        
        $currentUser = Auth::user();
        
        Log::debug("[UsersController - currentUser]: ".$currentUser);

        return new UserResource($currentUser);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::debug('[UsersController] - index');

        return UserResource::collection(User::orderBy('last_name', 'asc')->get());
    }


}
