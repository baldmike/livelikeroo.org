@component('mail::message')

A donation has just been made, here's the details:

Donor: {{ $donation->first_name }} {{ $donation->last_name }}
Name on card: {{ $donation->name_on_card }}
Email of donor: {{ $donaiton->email }}
Amount: {{ $donation->amount }}

@endcomponent
