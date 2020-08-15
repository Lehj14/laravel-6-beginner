@component('mail::message')
# Introduction Hello From Email

{{ $customer->name }},
Welcome to our cool application.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
