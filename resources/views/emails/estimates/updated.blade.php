@component('mail::message')
# Bonjour {{ $estimate->demand->training->user->first_name }} {{ $estimate->demand->training->user->last_name }},

## Votre devis a été mis à jour.

<p>Formation : {{ $estimate->demand->training->title }}</p>
<p>Par : {{ $estimate->demand->user->first_name }} {{ $estimate->demand->user->last_name }}</p>
<p>Prix : {{ $estimate->demand->training->price }} $CAD</p>
<p>Taxes : {{ sprintf("%.2f", $estimate->demand->training->price * 0.15) }} $CAD</p>
<p>Prix TTC : {{ $estimate->price }} $CAD</p>
<p>Status du devis : {{ $estimate->status == 'confirmed' ? 'Confirmé' : 'Annulé' }}</p>

<p>===========================================</p>

## Your estimate has been updated.

<p>Training : {{ $estimate->demand->training->title }}</p>
<p>By       : {{ $estimate->demand->user->first_name }} {{ $estimate->demand->training->user->last_name }}</p>
<p>Price    : {{ $estimate->demand->price }} $CAD</p>
<p>Tax      : {{ sprintf("%.2f", $estimate->demand->training->price * 0.15) }} $CAD</p>
<p>Price (tax included) : {{ $estimate->price }} $CAD</p>
<p>Status of the estimate : {{ $estimate->status == 'confirmed' ? 'confirmed' : 'cancelled' }}</p>
<br>

@component('mail::button', ['url' => 'https://rsf.fahmiderbali.com/sent-estimates'])
    Consulter le devis en ligne<br>
    View the estimate online
@endcomponent

Merci!
Thank you!<br>
{{ config('app.name') }}
@endcomponent
