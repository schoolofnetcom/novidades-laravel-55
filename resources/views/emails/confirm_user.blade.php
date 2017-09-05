@component('mail::message')
# Confirmação de registro

The body of your message.

@component('mail::button', ['url' => ''])
Click aqui para confirmar sua conta
@endcomponent

Erik F,
Thanks,<br>
{{ config('app.name') }}
@endcomponent
