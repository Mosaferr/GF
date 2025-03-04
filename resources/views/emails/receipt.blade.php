<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rachunek</title>
</head>
<body>
    <p>Dzień dobry, {{ $client->name }}!</p>
    <p>Załączamy rachunek za opłaconą wycieczkę: <strong>{{ $trip->trip_name }}</strong>.<br>
    W terminie: {{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} -
    {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }} roku.<br>
    Zobaczymy jak wygląda {{ $trip->destination }}.</p>
    <p>W razie pytań jesteśmy do Twojej dyspozycji.<br>
    Życzymy udanej podróży!</p>
    <p>---------------------</p>
    <p><i>Zespół Globfrotter.pl</i></p>
</body>
</html>
