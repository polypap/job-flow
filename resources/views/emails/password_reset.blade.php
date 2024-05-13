@component('mail::message')
<h3>Hello {{ $user->name}}</h3>

@component('mail::button', ['url' => url('reset-password/'.$user->remember_token)])
Reset Password
@endcomponent
<p>You have requested a password reset at Testfolio. If it was not you, please consider changing your password.</p>
@endcomponent