@extends('layouts.email')

@section('headline')
    <p>
        Thank you for your monthly donation of ${{ $donation->amount }}.00, {{ $user->first_name }}! 
    </p>
@stop

@section('content')
    <p>
        Your monthly donations will automatically be charged on this day each month, and will continue until you cancel, which you may do by emailing livelikeroo@gmail.com. Thank you from the bottom of our hearts!
    </p>
@stop

@section('receipt')
    <p> username: {{ $user->email }}</p>
    <p>{{ $donation->name_on_card }}</p>
    <p>${{ $donation->amount }}.00, {{ $donation->frequency }}</p>
    <p>{{ ($donation->created_at)->tz('America/Chicago')->toDayDateTimeString() }}</p>

    <p>Our Tax ID is EIN: 47-4770782</p>
@stop
