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
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel panel-primary">
                <h3 class="text-center">My Trips</h3>
                <div class="panel-body">



                {{--@include('partials.modal')--}}


                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Departure Date</th>
                            <th>Destination Country </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse ($userTrips as $userTrip)
                            @php
                                $dateStatus = App\Helpers\DateHelper::defineDateStatusToCancel($userTrip->departure_date);
                            @endphp
                        <tr id="cancelTr{{$userTrip->id}}">
                            <td>{{$userTrip->getDepartureDate()}}</td>
                            <td>{{$userTrip->country_name}}</td>
                            <td>
                                @switch($dateStatus)
                                    @case('over')
                                        <i>the date is over</i>
                                        @break
                                    @case('tooClose')
                                        <i>the departure day is too closer to cancel</i>
                                        @break
                                    @default
                                        {{--<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>--}}
                                        <a href="" class="btn btn-sm btn-danger btn-block cancelButton"  data_id="{{$userTrip->id}}" role="button">Cancel Trip</a>
                                @endswitch
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">You don't have trip.</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<form id="trip_cancel_form" style="display: none;">--}}
    {{--@csrf--}}
    {{--@method('DELETE')--}}
{{--</form>--}}
{{--<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>--}}