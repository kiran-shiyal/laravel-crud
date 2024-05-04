  @component('mail::message')
     
<h1>{{ $mailData['title'] }}</h1>
   <p>Please click the button below to verify email address</p>

 @component('mail::button', ['url' => $mailData['url'], 'color' => 'primary'])
Click Here to Verify Email
@endcomponent

     {{ config('app.name') }}
@endcomponent
