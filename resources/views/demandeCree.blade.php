<html>
    <body>
        <h2>Demande de formation : {{ $demand->training->title }}</h2>
        <h3>Pour: {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}</h3>
        <h3>Par : {{ $demand->user->first_name }} {{ $demand->user->last_name }}</h3>
        <h4>Status de la demande : {{ $demand->status }}</h4>
    </body>
</html>
