@component('mail::message')
This is a test email, please ignore.

@component('mail::button', ['url' => url('/')])
Link To {{ config('app.name') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent