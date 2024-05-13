@component('mail::message')
<h3>Hello {{ $user->name}}</h3>

@component('mail::button', ['url' => url('verify/'.$user->remember_token)])
Verify Account
@endcomponent
<p>If you have any issue loging in after your verification, please contact us.</p>
@endcomponent