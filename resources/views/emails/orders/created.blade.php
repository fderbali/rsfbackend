@component('mail::message')
# Bonjour {{ $order->training->user->first_name }} {{ $order->training->user->last_name }},

## Un devis vient d'être payé :

<p>Par :  {{ $order->estimate->demand->user->first_name }} {{ $order->estimate->demand->user->last_name }}</p>
<p>Formation : {{ $order->training->title }}</p>
<p>Prix total : {{ $order->price }} $CAD</p>

@component('mail::button', ['url' => 'http://localhost:8080/form-session?order='.$order->id])
Céduler les séances
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
