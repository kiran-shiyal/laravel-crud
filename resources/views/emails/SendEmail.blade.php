@component('mail::message')
 {{ $mailData['title'] }}

 Please click the button below to verify email address

@component('mail::button', ['url' => $mailData['url']])
Visit Our Website
@endcomponent

if you  did not create the account , no futher action is requires
Thanks,
{{ config('app.name') }}
@endcomponent
