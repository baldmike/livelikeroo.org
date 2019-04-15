@extends('layouts.email')

@section('headline')
    <p>
        Thank you for your monthly donation of ${{ $donation->amount }}.00, {{ $donation->name_on_card }}! 
    </p>
@stop

@section('content')
    <p>
        Your support of The Live Like Roo Foundation
    </p>

    <p>
        is how we're able to help as many pets as we do, 
    </p>
    
    <p>
        and allows that many more pets to #LiveLikeRoo!
    </p> 
    
@stop

@section('monthly')
    <p>
        Your monthly donations will automatically be charged on this day each month, 
    </p>
    
    <p>
        and will continue until you cancel.
    </p>

    <p>
        You may log in and view your account from the "login" link at the bottom of our website,
    </p> 
    <p>
        using your email and the password you created.
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