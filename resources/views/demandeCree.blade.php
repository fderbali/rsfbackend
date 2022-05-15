<html>
    <body>
        <h1>
            Email demande créé !
            {{ $demand->status }} <br/>
            {{ $demand->training->title }}<br/>
            {{ $demand->user->first_name }}<br/>
            {{ $demand->user->last_name }}<br/>
            {{ $demand->training->user->first_name }} {{ $demand->training->user->last_name }}<br/>
        </h1>
    </body>
</html>
