<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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
Route::middleware('throttle:100|200,1')->group(function () {

    Route::get('public/user/{userId}/trip','Api\TripsController@getUpcomingUserTrips')
        ->where('userId', '[0-9]+')
        ->name('upcoming_user_trips');

    Route::get('public/trip','Api\TripsController@getUpcomingUsersTrips')
        ->name('upcoming_users_trips');
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
/*Route::get('/user/{userId}', function (Request $request, $userId) {
    dump($userId);
    //Auth::login(\App\User::find($userId));
    Auth::loginUsingId($userId);
    dd(Auth::check(), Auth::user() );
    return $request->user();
});*/


