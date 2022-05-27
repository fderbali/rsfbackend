@component('mail::message')

# Bonjour {{ $estimate->demand->user->first_name }} {{ $estimate->demand->user->last_name }},

## Voici votre devis pour une demande de formation qui a été acceptée.

<p>Formation : {{ $estimate->demand->training->title }}</p>
<p>Par : {{ $estimate->demand->training->user->first_name }} {{ $estimate->demand->training->user->last_name }}</p>
<p>Prix : {{ $estimate->demand->training->price }} $CAD</p>
<p>Taxes : {{ sprintf("%.2f", $estimate->demand->training->price * 0.15) }} $CAD</p>
<p>Prix TTC : {{ $estimate->price }} $CAD</p>

<p>=======================================================================================================</p>

# Hello {{ $estimate->demand->user->first_name }} {{ $estimate->demand->user->last_name }},

## Here is your estimate for a training request that has been accepted.

<p>Training : {{ $estimate->demand->training->title }}</p>
<p>By       : {{ $estimate->demand->training->user->first_name }} {{ $estimate->demand->training->user->last_name }}</p>
<p>Price    : {{ $estimate->demand->training->price }} $CAD</p>
<p>Tax      : {{ sprintf("%.2f", $estimate->demand->training->price * 0.15) }} $CAD</p>
<p>Price (tax included) : {{ $estimate->price }} $CAD</p>
<br>

@component('mail::button', ['url' => 'http://localhost:8080/received-estimates'])
    Consulter et/ou payer votre devis en ligne<br>
    View and/or pay your estimate online
@endcomponent

Merci!
Thank you!<br>

{{ config('app.name') }}
@endcomponent
