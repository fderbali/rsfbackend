@component('mail::message')
Bonjour {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }},

Une demande de formation vous étant destiné vient d'être créée!
<br/>
Voici les détails :

## Demande de formation : {{ $demand->training->title }}
## Par : {{ $demand->user->first_name }} {{ $demand->user->last_name }}
## Status de la demande : {{ $demand->status }}

@component('mail::button', ['url' => 'http://localhost:8080/sent-demands'])
Consulter votre demande en ligne
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
