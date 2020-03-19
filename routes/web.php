<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Trips;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::middleware('throttle:100|200,1')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes(); //Auth::routes(['verify'=>'true']); //cf yossef578349545
    Route::get('home', 'HomeController')->name('home');
    Route::get('trips', 'TripsController@index')->name('trips');
    Route::post('trips', 'TripsController@store')->name('tripStore');
    Route::delete('trips', 'TripsController@destroy')->name('tripDestroy');

    /**
     * download file routes
     */
    //user x
    Route::get('public/user/{userId}/trip/download',function($userId){
        return response()->streamDownload(function () use ($userId) {
            echo json_encode(Trips::getUserIncomingTrips($userId));
        }, 'User_'.$userId.'_Trips.json');
    })->where('userId', '[0-9]+')->name('download_upcoming_user_trips');

    // all users
    Route::get('public/trip/download',function(){
        return response()->streamDownload(function () {
            echo json_encode(Trips::getUpcomingUsersTrips());
        }, 'usersTrips.json');
    })->name('download_upcoming_users_trips');
});

