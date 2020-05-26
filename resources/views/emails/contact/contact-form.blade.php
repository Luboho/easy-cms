@component('mail::message')
# <h2 style="padding: 15px; background-color: rgb(122, 204, 122);">Správa od zákazníka</h2>

<p><strong>Meno</strong> {{ $data['name'] }}</p>
<p><strong>Email</strong> {{ $data['email'] }}</p>

<p><strong>Správa</strong></p>

{{ $data['message'] }}
@endcomponent
