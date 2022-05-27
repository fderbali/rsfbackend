@component('mail::message')

# Bonjour {{ $demand->user->first_name }} {{ $demand->user->last_name }},

## Votre demande de formation a été mise à jour.

<p>Demande de formation : {{ $demand->training->title }}</p>
<p>Par: {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}</p>
<p>Status de la demande : {{ $demand->status == 'confirmed' ? 'Confirmée' : 'Annulée' }}</p>

@component('mail::button', ['url' => 'http://localhost:8080'])
    Consulter votre demande en ligne
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
