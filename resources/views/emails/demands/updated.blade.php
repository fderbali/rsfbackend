@component('mail::message')

# Bonjour {{ $demand->user->first_name }} {{ $demand->user->last_name }},

## Votre demande a été mise à jour

<p>Demande de formation : {{ $demand->training->title }}</p>
<p>Pour: {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}</p>
<p>Par : {{ $demand->user->first_name }} {{ $demand->user->last_name }}</p>
<p>Status de la demande : {{ $demand->status == 'confirmed' ? 'Confirmée' : 'Annulée' }}</p>

@component('mail::button', ['url' => 'http://localhost:8080'])
    Consulter votre demande en ligne
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
