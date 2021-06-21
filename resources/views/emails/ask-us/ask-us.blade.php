@component('mail::message')
# Introduction

<p>Email : {{ $ask_message->email }}</p>
<p>Phone : {{ $ask_message->phone }}</p>
<p>Message : {{ $ask_message->message }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
