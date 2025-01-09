<!-- resources/views/admin/admin.blade.php -->
@php
    $countryMap = [
        'Argentyna, Chile' => 'argentina',
        'Indonezja' => 'indonesia',
        'Kambodża' => 'cambodia',
        'Peru, Boliwia' => 'peru',
        'Sri Lanka' => 'sri_lanka',
        'Tybet, Chiny' => 'tibet',
    ];
@endphp

@extends('layouts.app')

@section('title', 'Panel administratora')

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1300px;">
			<div class="col-md-12 text-center pb-1 mt-3">
				<h2>Panel administratora</h2>
			</div>

            <div class="menu-text col-md-12 text-center">
                <hr>
                <div class="d-grid d-md-block mx-auto my-5">
                    <a href="{{ route('admin.clientlist') }}" class="btn btn-warning shadow btn-lg mx-4">Lista <br>klientów</a>
                    <a href="{{ route('admin.triplist') }}" class="btn btn-warning shadow btn-lg mx-4">Lista <br>wycieczek</a>
                    <a href="{{ route('gallery.chile') }}" class="btn btn-warning shadow btn-lg mx-4">Wyszukaj <br>klientów</a>
                    <a href="{{ route('gallery.china') }}" class="btn btn-warning shadow btn-lg mx-4">Wyszukaj <br>wycieczkę</a>
                </div>
                <hr>
            </div>

            <div class="table-term col-12 px-4 mt-4">
                <div class="col-md-12 text-left pb-1 mt-4">
                    <h5>Najbliższe wyprawy</h5>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Kraj</th>
                            <th scope="col">Termin</th>
                            <th scope="col">Nazwa wyprawy</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Miejsca</th>
                            <th scope="col" class="text-center" colspan="3">Akcje</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dates as $date)
                            <tr class="align-middle">
                                <td class="text-center">{{ $date->id }}</td>
                                <td>{{ $date->trip->country }}</td>
                                <td scope="row">
                                    {{ \Carbon\Carbon::parse($date->start_date)->format('d.m') }} -
                                    {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
                                </td>
                                <td>{{ $date->trip->trip_name }}</td>
                                <td>{{ $date->price }} PLN</td>
                                <td>
                                    {{ $date->available_seats == 0 ? 'Brak wolnych miejsc' :
                                    ($date->available_seats == 1 ? '1 wolne miejsce' :
                                    ($date->available_seats > 1 && $date->available_seats < 5 ? $date->available_seats . ' wolne miejsca' : $date->available_seats . ' wolnych miejsc'))
                                }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('group.show', ['trip_id' => $date->id]) }}" class="btn btn-success btn-sm shadow">&nbsp;Grupa&nbsp;</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.tripdata.edit', ['tripId' => $date->trip_id, 'dateId' => $date->id]) }}" class="btn btn-primary btn-sm shadow">Edycja</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('excursions.' . $countryMap[$date->trip->country]) }}" class="btn btn-danger btn-sm shadow">Usuń</a>
                                </td>
                                {{-- <td class="text-center"><a href="{{ route('excursions.argentina') }}" class="btn btn-primary btn-sm shadow">Program</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </main>
@endsection
