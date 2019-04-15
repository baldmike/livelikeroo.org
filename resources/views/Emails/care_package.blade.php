@extends('layouts.email')

@section('headline')
    <p>
        Good News! {{ $care_package->pet_name }}'s care package has been requested!
    </p>
@stop

@section('content')
    <p>
        We do our best to ship as quickly as possible, 
    </p>

    <p>
        and you should receive the care package within a week! 
    </p>
    
    <p>
        Thank you for letting us help {{ $care_package->pet_name }} #LiveLikeRoo!
    </p> 
    
@stop


@section('footer')
  <h6>&copy;2019 The Live Like Roo Foundation</h6>
@stop