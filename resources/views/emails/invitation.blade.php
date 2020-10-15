@component('mail::message')
<h1 class="text-secondary">Dobrý deň</h1>

Boli ste pozvaní k registrácii v redakčnom systéme webovej stránky 
<a  href="{{ url('/') }}">{{ url('/') }} .</a>
<br>
Pred prvým prihlásením je nutné zaregistrovať sa.  Kliknite na odkaz "Registrácia" prosím.


<br>

<a href="{{ url('/').'/verify?code='.$email_data['verification_code'] }}"><h2>Registrácia</h2></a>

<br>


S pozdravom,<br>
{{ config('app.name') }}
@endcomponent
