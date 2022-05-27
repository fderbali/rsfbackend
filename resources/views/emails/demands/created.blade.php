@component('mail::message')

# Bonjour {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }},

## Une demande de formation vous étant destiné vient d'être créée!

<p>Demande de formation : {{ $demand->training->title }}</p>
<p>Par : {{ $demand->user->first_name }} {{ $demand->user->last_name }}</p>
<p>Status de la demande : {{ $demand->status }}</p>

<p>=======================================================================================================</p>

# Hello {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }},

## A training request for you has just been created!

<p>Training request : {{ $demand->training->title }}
<p>By : {{ $demand->user->first_name }} {{ $demand->user->last_name }}
<p>Status of the request : {{ $demand->status }}

<br>
@component('mail::button', ['url' => 'http://localhost:8080/received-demands'])
Consultez votre demande en ligne!<br>
View your request online!

@endcomponent

Merci!
Thank you!<br>

{{ config('app.name') }}
@endcomponent
