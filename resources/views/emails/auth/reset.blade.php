@component('mail::message')
# Introduction

Blood bank Reset Password
@component('mail::button', ['url' => 'http://google.com'])
Reset
@endcomponent


<p>  Your reset code is : {{$code}}</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
