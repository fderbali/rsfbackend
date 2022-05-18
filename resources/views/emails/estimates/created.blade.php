@component('mail::message')

# Bonjour {{ $estimate->demand->user->first_name }} {{ $estimate->demand->user->last_name }},

## Votre devis :

<p>Formation : {{ $estimate->demand->training->title }}</p>
<p>Prix : {{ $estimate->demand->training->price }} $CAD</p>


@component('mail::button', ['url' => 'http://localhost:8080'])
    Consulter et/ou payer votre devis en ligne
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
