@component('mail::message')
Bonjour {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }},

Votre demande a bien été créé !
Voici les détails :

## Demande de formation : {{ $demand->training->title }}
## Pour: {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}
## Par : {{ $demand->user->first_name }} {{ $demand->user->last_name }}
## Status de la demande : {{ $demand->status }}

@component('mail::button', ['url' => 'http://localhost:8080/sent-demands'])
Consulter votre demande en ligne
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
