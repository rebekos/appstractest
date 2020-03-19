<?php

namespace App\Http\Controllers;

use App\Trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {
        $this->middleware('auth'); // $this->middleware(['auth'=>'verified']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     * @internal param Request $request
     */
    public function index()
    {
        return view('trips', [
            'userTrips'=> Trips::getUserIncomingTrips(Auth::user()->id, 50),
            'usersTrips'=> Trips::getUsersIncomingTrips()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->input(), [
            'destination'  => 'required|in:Israel,United States,United Kingdom',
            'bday'         => 'required|date|after:today'
        ])->validate();

        Trips::create([
            'departure_date' => $request->input('bday'),
            'country_name' => $request->input('destination'),
            'user_id' => Auth()->user()->id
        ]);

        return redirect('trips')->with('successMessage', 'Your trip has been registered');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @internal param Trips $trips
     * @return $this|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        /**
         * @var Trips $tripToDelete
         */
        $validator = Validator::make($request->post(), ['tripId'  => 'required|integer']);
        if($validator->fails() || ! Trips::deleteIsAllowed(Auth()->user()->id, $request->post('tripId'), config('appstractor.number_day_cancel_limit'))){
            $message = __('myapp.delete_trip_error',['id'=>$request->post('tripId')]);
            if($request->ajax()){
                return response($message, 400);
            }
            else {
                return redirect('trips')->with('errorMessage', $message);
            }
        }

        $tripToDelete = Trips::find($request->post('tripId' ));
        $message = __('myapp.delete_trip_success',['destination'=>$tripToDelete->country_name, 'date'=>$tripToDelete->getDepartureDate()]);
        $tripToDelete->delete();

        if($request->ajax()){
            return response(['status'=>200,'message'=>$message], 200);
        }
        else {
            return redirect('trips')->with('successMessage', $message);
        }
    }


//    /**
//     * @return \Symfony\Component\HttpFoundation\StreamedResponse
//     */
//    public function downloadUpcomingUsersTrips(){
//        return response()->streamDownload(function () {
//            echo json_encode(Trips::getUpcomingUsersTrips());
//        }, 'downloadUpcomingUsersTrips.json');
//    }
}
