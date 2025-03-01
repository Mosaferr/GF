<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie uczestnictwa</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; font-weight: bold; font-size: 16px; }
        .section { margin-top: 20px; margin-left: 50px; margin-right: 50px;}
        .bold { font-weight: bold; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table td, .table th { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <div class="header">GlobFrotter.pl</div>
    <div class="header">UMOWA - ZGŁOSZENIE UCZESTNICTWA W IMPREZIE TURYSTYCZNEJ</div>
    <div class="header">Umowa na odległość</div>

    <div class="section">
        <p>Data zgłoszenia: <span class="bold">{{ now()->format('d.m.Y H:i') }}</span></p>
    </div>

    <div class="section">
        <p class="bold">Zawarta pomiędzy:</p>
        <p><span class="bold">Organizatorem:</span> Paweł Edmund Strzelecki prowadzący działalność gospodarczą pod nazwą GlobFrotter.pl, z siedzibą w Łodzi przy ul. S. Sterlinga 26.</p>
        <p>a</p>
        <p><span class="bold">Klientem:</span> {{ $client->name }} {{ $client->middle_name }} {{ $client->last_name }}, urodzony
        {{ \Carbon\Carbon::parse($client->birth_date)->format('d.m.Y') }}, zamieszkały przy ulicy {{ $client->address->street }} {{ $client->address->house_number }}
        @if($client->address->apartment_number) / {{ $client->address->apartment_number }} @endif, {{ $client->address->postal_code }} {{ $client->address->city->city_name }}.</p>
    </div>

    <div class="section">
        <p>Przedmiotem Umowy jest wyprawa turystyczna o nazwie: <span class="bold">{{ $trip->trip_name }}</span><br>
        Miejsce wyprawy: <span class="bold">{{ $trip->country }}</span>,<br>
        Termin wyprawy: <span class="bold">{{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} - {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}.</span></p>
        <p>Całkowity koszt wyprawy wynosi <span class="bold">{{ number_format($date->price, 2, ',', ' ') }} PLN</span>.</p>
    </div>

    <div class="section">
        <p>Klient jest zobowiązany do uregulowania należności za zgłoszonych uczestników:</p>
        <table class="table">
            <tr>
                <th>Imię i nazwisko</th>
                <th>Data urodzenia</th>
                <th>Adres</th>
                <th>Email</th>
                <th>Telefon</th>
            </tr>

            @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->name }} {{ $participant->middle_name }} {{ $participant->last_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($participant->birth_date)->format('d.m.Y') }}</td>
                    <td>{{ $participant->address->street }} {{ $participant->address->house_number }}
                        @if($participant->address->apartment_number) / {{ $participant->address->apartment_number }} @endif,
                        {{ $participant->address->postal_code }} {{ $participant->address->city->city_name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>{{ $participant->phone }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="section" style="margin-top: 40px;">
        <p>Paweł Edmund Strzelecki</p>
    </div>
</body>
</html>
