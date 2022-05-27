@component('mail::message')

# Bonjour {{ $demand->user->first_name }} {{ $demand->user->last_name }},

## Votre demande de formation a été mise à jour.

<p>Demande de formation : {{ $demand->training->title }}</p>
<p>Par : {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}</p>
<p>Status de la demande : {{ $demand->status == 'confirmed' ? 'Confirmée' : 'Annulée' }}</p>

<p>=======================================================================================================</p>

# Hello {{ $demand->user->first_name }} {{ $demand->user->last_name }},

## Your training request has been updated.

<p>Training request : {{ $demand->training->title }}</p>
<p>By : {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}</p>
<p>Status of the request : {{ $demand->status == 'confirmed' ? 'Confirmée' : 'Annulée' }}</p>
<br>

@component('mail::button', ['url' => 'http://localhost:8080/sent-demands'])
    Consulter votre demande en ligne<br>
    View your request online

@endcomponent

Merci!
Thank you!<br>

{{ config('app.name') }}
@endcomponent
