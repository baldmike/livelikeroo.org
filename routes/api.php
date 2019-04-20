<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Api\AuthController@login');
Route::post('/register', 'Api\AuthController@register');
Route::post('/logout', 'Api\AuthController@logout');   

// forms
Route::resource('finreqs', 'Api\FinreqsController');
Route::resource('care_pkgs', 'Api\CarePackageController');
Route::resource('contact', 'Api\MessageController');

// donations 
Route::post('/make_donation', 'Api\DonationController@oneTime');
Route::post('/monthly_donation', 'Api\DonationController@monthly');

Route::middleware('auth:api')->group(function () {
    
    Route::get('/user', 'Api\UsersController@current');
    
});

