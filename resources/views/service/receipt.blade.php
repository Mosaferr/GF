<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie uczestnictwa</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; margin-top: 30px;}
        .section { margin-top: 20px; margin-left: 50px; margin-right: 50px;}
        .bold { font-weight: bold; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table td, .table th { border: 1px solid #000; padding: 5px; text-align: left; }
        .block {
            display: inline-block;      /* ustawienie bloków obok siebie */
            width: 48%;                 /* szerokość bloków */
            vertical-align: top;        /* wyrównanie bloków do góry */
        }
    </style>
</head>
<body>
    <div class="section" style="text-align: center;">
        <h2>Glob<i>Frotter</i>.pl</h2>
        <h3>POTWIERDZENIE OPŁATY IMPREZY TURYSTYCZNEJ</h3>
    </div>

    <div class="section">
        <p>Data wystawienia: {{ now()->format('d.m.Y H:i') }}</p>
        <div class="block">
            <p class="bold">Sprzedawca:</p>
            <span class="bold">Globfrotter.pl</span>,<br>ul. S. Sterlinga 26,<br>90-212 Łódź.
        </div>

        <div class="block">
            <p class="bold">Nabywca:</p>
            <span class="bold">{{ $client->name }} {{ $client->middle_name }} {{ $client->last_name }}</span>,<br>
            ul. {{ $client->address->street }} {{ $client->address->house_number }}
            @if($client->address->apartment_number) / {{ $client->address->apartment_number }}@endif,<br>
            {{ $client->address->postal_code }} {{ $client->address->city->city_name }}.
        </div>
    </div>

    <div class="section">
        <p class="bold">Usługa:</p>
        <p>Wyprawa turystyczna: <span class="bold">{{ $trip->trip_name }}</span><br>
        Miejsce wyprawy: <span class="bold">{{ $trip->country }}</span><br>
        Termin wyprawy: <span class="bold">{{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} -
            {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}.</span></p>
        <p>Koszt wyprawy uczestnika: <span class="bold">{{ number_format($date->price, 2, ',', ' ') }} PLN</span><br>
            Całkowity koszt: <span class="bold">{{ $participantsCount }}</span>
            * <span class="bold">{{ number_format($date->price, 2, ',', ' ') }} PLN</span>
            = <span class="bold">{{ number_format($totalPrice, 2, ',', ' ') }} PLN</span>.</p>
        </div>

    <div class="section">
        <table class="table">
            <tr>
                <th>Imię i nazwisko</th>
                <th>Adres</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Kwota w PLN</th>
            </tr>

            @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->name }} {{ $participant->middle_name }} {{ $participant->last_name }}</td>
                    <td>{{ $participant->address->street }} {{ $participant->address->house_number }}
                        @if($participant->address->apartment_number) / {{ $participant->address->apartment_number }} @endif,
                        {{ $participant->address->postal_code }} {{ $participant->address->city->city_name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>{{ $participant->phone }}</td>
                    <td>{{ number_format($date->price, 2, ',', ' ') }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4" class="bold">RAZEM</td>
                <td><span class="bold">{{ number_format($totalPrice, 2, ',', ' ') }}</span></td>
            </tr>
        </table>
        <p>Forma płatności: Stripe / płatność online</p>
    </div>

    <div class="section" style="text-align: right;">
        <p class="bold" style="text-align: right;">RACHUNEK OPŁACONY</p>
        <h2>Glob<i>Frotter</i>.pl</h2>
    </div>
</body>
</html>
