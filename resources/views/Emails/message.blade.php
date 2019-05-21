@component('mail::message')
# This is a message from {{ $message -> first_name . ' ' . $message -> last_name }}, at {{ $message -> created_at }}:

{{ $message -> message }}

{{ $message -> first_name . ' ' . $message -> last_name }}<br>
{{ $message -> email }}
via: livelikeroo.org
@endcomponent
