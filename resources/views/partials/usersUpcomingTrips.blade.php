<?php
/**
 * Created by PhpStorm.
 * User: yossef
 * Date: 3/10/2020
 * Time: 3:04 PM
 */
use App\Helpers\DateHelper;
/**
 * @var \App\Trips $userTrip
 * @var [] $usersTrips
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel panel-primary">
                <h3 class="text-center">All User's Upcoming Trips</h3>
                <div class="panel-body">

                    {{-- Dialog --}}
                    @include('partials.dialog')

                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Departure Date</th>
                            <th>Destination Country</th>
                            <th>First Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($usersTrips as $usersTrip)
                            <tr>
                                <td>{{$usersTrip->departure_date}}</td>
                                <td>{{$usersTrip->country_name}}</td>
                                <td><a href="#"
                                       class="userInfoButton"
                                       data_totalTrips="{{$usersTrip->totalTrips}}"
                                       data_userRegistrationDate="{{$usersTrip->userRegistrationDate}}"
                                       role="button"
                                       title="total trips:{{$usersTrip->totalTrips}} , registered at {{$usersTrip->userRegistrationDate}}"
                                    >{{Str::title($usersTrip->userName)}}</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">There are no trips actually.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
