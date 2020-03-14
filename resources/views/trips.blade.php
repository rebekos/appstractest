@extends('layouts.app')

@section('content')

    {{-- user messages & errors  --}}
    @include('partials.messages')

    {{-- ADD TRIP --}}
    @include('partials.addTrip')

    {{-- MY TRIPS --}}
    @include('partials.myTrips')

    {{-- All User's Upcoming Trips --}}
    @include('partials.usersUpcomingTrips')

@endsection


@section('script')
<script >
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        })

        $(".cancelButton").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            let promise = submitDeleteTrip(this);
        });

        $(".userInfoButton").mouseover(function(e) {
            e.preventDefault();
            e.stopPropagation();
            //            var button = $(this);
            //            var totalTrips              = button.attr('data_totalTrips')
            //            var userRegistrationDate    = button.attr('data_userRegistrationDate')
            //            var userId                  = button.attr('data_userId')
            //            //var rowEle = $("#cancelTr"+id);
            ////            var dialogEle = $("#modalInvestRecap");
            ////            dialogEle.toggle();
            ////            $('#modalInvestRecap').modal('show');
            //            $('#modalInvestRecap').show();
            //            //console.log(totalTrips, userRegistrationDate)
            //
            //            getUserTrips(userId)

        });
    });

    async function submitDeleteTrip(e){
        var button = $(e)
        var data = await $.post('{{ route('tripDestroy') }}', {
            'tripId' : button.attr('data_id'),
            '_method': 'delete'
        });
        if(data && data.status==200){
            alert(data.message);
            button.html('<img src="{{asset('/img/loader.svg')}}" alt="" width="25">');
            $("#cancelTr"+button.attr('data_id')).addClass("graying").hide(3000);
        }
        else{
            if(data && data.status!=200){
                alert(data.message);
            }
        }
    }
</script>
<style>
    .graying{
        color: darkred;
        font-weight: bolder;
    }
</style>
@endsection

