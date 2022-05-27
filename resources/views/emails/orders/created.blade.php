@component('mail::message')

# Bonjour {{ $order->training->user->first_name }} {{ $order->training->user->last_name }},

## Un devis vient d'être payé :

<p>Par :  {{ $order->estimate->demand->user->first_name }} {{ $order->estimate->demand->user->last_name }}</p>
<p>Formation : {{ $order->training->title }}</p>
<p>Prix total : {{ $order->price }} $CAD</p>

<p>=======================================================================================================</p>

# Hello {{ $order->training->user->first_name }} {{ $order->training->user->last_name }},

## An estimate has just been paid :

<p>By :  {{ $order->estimate->demand->user->first_name }} {{ $order->estimate->demand->user->last_name }}</p>
<p>Training : {{ $order->training->title }}</p>
<p>Total price : {{ $order->price }} $CAD</p>
<br>

@component('mail::button', ['url' => 'http://localhost:8080/form-session?order='.$order->id])
Céduler les séances pour cette formation.<br>
Schedule the sessions for this training.
@endcomponent

Merci!
Thank you!<br>

{{ config('app.name') }}
@endcomponent
