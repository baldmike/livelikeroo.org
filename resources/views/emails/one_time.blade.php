@extends('layouts.email')

@section('headline')
    <p>
        Thank you for your one-time donation of ${{ $donation->amount }}.00, {{ $donation->name_on_card }}! 
    </p>
@stop

@section('content')
    <p>
        Thank you for your tax-deductable donation to The Live Like Roo Foundation! Your generous support is how we've been able to help over 15,000 pets thru cancer diagnoses, sharing a bit of light and hope in an otherwise dark situation. A receipt, and our tax ID number is below for your records. From the bottom of our hearts, thank you!
    </p>
    
@stop

@section('receipt')
    <p>{{ $donation->name_on_card }}</p>
    <p>${{ $donation->amount }}.00, {{ $donation->frequency }}</p>
    <p>{{ ($donation->created_at)->tz('America/Chicago')->toDayDateTimeString() }}</p>

    <p>Our Tax ID is EIN: 47-4770782</p>
@stop
