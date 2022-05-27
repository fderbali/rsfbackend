@component('mail::message')

# Bonjour {{ $estimate->demand->user->first_name }} {{ $estimate->demand->user->last_name }},

## Voici votre devis pour la demande de formation qui a été acceptée.

<p>Formation : {{ $estimate->demand->training->title }}</p>
<p>Par : {{ $estimate->demand->training->user->first_name }} {{ $estimate->demand->training->user->last_name }}</p>
<p>Prix : {{ $estimate->demand->training->price }} $CAD</p>
<p>Taxes : {{ sprintf("%.2f", $estimate->demand->training->price * 0.15) }} $CAD</p>
<p>Prix TTC : {{ $estimate->price }} $CAD</p>


@component('mail::button', ['url' => 'http://localhost:8080'])
    Consulter et/ou payer votre devis en ligne
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
