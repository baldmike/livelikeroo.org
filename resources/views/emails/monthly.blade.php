@extends('layouts.email')

@section('headline')
    <p>
        Thank you for your donation of ${{ $donation->amount }}.00, {{ $user->first_name }}! 
    </p>
@stop

@section('content_top')
    <p>Hello, {{ $user->first_name }},</p>
    <br>
    <p>
        Thank you for your donation! Your support of The Live Like Roo Foundation is how we're able to help as many pets as we do.
    </p>
    
@stop

@section('content_bottom')
    <p>
        Your monthly donations will automatically be charged on this day each month, and will continue until you cancel, which you may do by emailing livelikeroo@gmail.com.
    </p>
@stop

@section('receipt')
    <p> username: {{ $user->email }}</p>
    <p>{{ $donation->name_on_card }}</p>
    <p>${{ $donation->amount }}.00, {{ $donation->frequency }}</p>
    <p>{{ ($donation->created_at)->tz('America/Chicago')->toDayDateTimeString() }}</p>

    <p>Our Tax ID is EIN: 47-4770782</p>
@stop

@section('footer')
  <h6>&copy;2019 The Live Like Roo Foundation</h6>
@stop