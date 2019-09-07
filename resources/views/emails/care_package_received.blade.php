@component('mail::message')
Hello Sarah,

A new Care Package Request has come in. When overwhelmed with the urge to hit 'reply', please remember that I'm a robot, and you can't respond to me.

Here are some fun facts!

Person: {{ $care_package -> first_name }} {{ $care_package -> last_name }}<br>
Pet: {{ $care_package -> pet_name }}<br>
Email: {{ $care_package -> email }}<br>
Received: {{ $care_package -> created_at }}

Love,
Robot Spaceman

@endcomponent
