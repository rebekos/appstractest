<?php

namespace App\Http\Controllers\Api;

use App\Trips;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TripsController extends Controller
{

    public function getUpcomingUserTrips($userId){
        $record = Trips::getUserIncomingTrips($userId);
        return response()->json($record);
    }

    public function getUpcomingUsersTrips(){
        return response()->json(Trips::getUpcomingUsersTrips());
    }

    //todo a finir
    public function downloadUpcomingUsersTrips(){
        $records = Trips::getUpcomingUsersTrips();
        return response()->download('./', date('Ymd_H:i:s').'.json');

/*        return response()->download($pathToFile, $name, $headers);
        return response()->download($pathToFile)->deleteFileAfterSend();*/

    }

}
