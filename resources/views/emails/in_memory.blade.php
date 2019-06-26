@extends('layouts.email')

@section('headline')
    <p>
        Hello, {{ $donation->recipient_name }}! 
    </p>
@stop

@section('content')
    
    <p>
        We wanted to let you know that {{ $donation->first_name }} {{ $donation->last_name }} has made a donation to The <a href="www.livelikeroo.org">Live Like Roo Foundation</a> in {{ $donation->honoree }}'s honor. 
    </p>

    <br>

    <p>
        Here's what {{ $donation->first_name }} had to say: 
    </p>

    <br>

    <p class="message-box">
        <em>{{ $donation->recipient_msg }}</em>
    </p>

    
@stop


@section('footer')
  <h6>&copy;2019 The Live Like Roo Foundation</h6>
@stop