@extends('layouts.email')

@section('headline')
    <p>
        Hello {{ $fin_req->first_name }}, We have received your application for financial assistance for
    </p>
    
    <p>    
    {{ $fin_req->pet_name }}, and are currently reviewing it.
    </p>
@stop

@section('content')
    <p>
        We know how difficult this period is for you and your
    </p>

    <p>
        family, so we are sending all of our collective strength to help you through.
    </p>
    
    <p>
        We truly hope we can help {{ $fin_req->pet_name }} #LiveLikeRoo!
    </p> 
@stop

@section('footer')
  <h6>&copy;2019 The Live Like Roo Foundation</h6>
@stop