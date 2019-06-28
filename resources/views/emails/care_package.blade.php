@extends('layouts.email')

@section('headline')
    <p>
        Good News! We've received {{ $care_package->pet_name }}'s care package request!
    </p>
@stop

@section('content')
    <p>
        We do our best to ship as quickly as possible, and you should receive the care package shortly! You'll receive another email when it ships to let you know it's on its way. When you receive the care package, we would love to see photos of {{ $care_package->pet_name }} enjoying their new toys and blanket! You can send photos to livelikeroo@gmail.com, or post them on our Facebook page. 
    </p>
    
    <p>
        Thank you for letting us help {{ $care_package->pet_name }} #LiveLikeRoo!
    </p> 

    <br><br>
    <p>Sarah</p>
    <p>Founder</p>
    <p>The Live Like Roo Foundation</p>
    
@stop