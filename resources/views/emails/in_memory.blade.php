@extends('layouts.email')

@section('headline')
    <p>
        Hello, {{ $donation->recipient_name }}! 
    </p>
@stop

@section('content_top')
    
    <p>
        We wanted to let you know that {{ $donation->first_name }} {{ $donation->last_name }} has made a donation to The <a href="www.livelikeroo.org">Live Like Roo Foundation</a> in {{ $donation->honoree }}'s honor. 
    </p>

    <br>

    <p>
        Here's what {{ $donation->first_name }} had to say: 
    </p>

    <p class="message-box">
        <em>{{ $donation->recipient_msg }}</em>
    </p>

@stop

@section('content_bottom')
    
    <hr>
    
    <p>
        We are an all-volunteer-run,  donation-based, 501C3 charitable organization who provides support and financial assistance to families whose pet faces a cancer diagnosis. Through grants, care packages, special experiences and genuine human support and kindness, The Live Like Roo Foundation has been able to assist thousands of pets and their families through cancer diagnoses.</h4>
    </p>
@stop


@section('footer')
  <h6>&copy;2019 The Live Like Roo Foundation</h6>
@stop