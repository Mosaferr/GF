<!-- resources/views/admin/findtrip.blade.php -->
@extends('layouts.app')
@section('title', 'Szukaj wyprawy')

@section('content')
<main class="custom-margin-top">

    {{-- FORMULARZ --}}
    <div class="form-container">
        <form id="searchForm" method="GET" action="{{ route('admin.findtrip') }}">
            @csrf
            <input type="hidden" name="redirect_url" value="{{ request('redirect_url', route('admin.triplist')) }}">
            <h3 class="mb-0 ms-2">Wyszukaj wyprawę</h3>
            <hr>

            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="destination" class="form-label">Destynacja</label>
                    <select class="form-select" id="destination" name="destination">
                        <option value="" disabled {{ request('destination') ? '' : 'selected' }}>Wybierz...</option>
                        @foreach($trips as $trip)
                        <option value="{{ $trip->id }}"
                                data-trip-name="{{ $trip->trip_name }}"
                                data-country="{{ $trip->country }}"
                                {{ request('destination') == $trip->id ? 'selected' : '' }}>
                            {{ $trip->destination }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Data rozpoczęcia</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ request('start_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Data zakończenia</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ request('end_date') }}">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="trip_name" class="form-label">Nazwa wyprawy</label>
                    <select class="form-select" id="trip_name" name="trip_name">
                        <option value="" disabled {{ request('trip_name') ? '' : 'selected' }}>Wybierz...</option>
                        @foreach($trips as $trip)
                        <option value="{{ $trip->trip_name }}"
                                data-trip-id="{{ $trip->id }}"
                                data-country="{{ $trip->country }}"
                                {{ request('trip_name') == $trip->trip_name ? 'selected' : '' }}>
                            {{ $trip->trip_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="price_min" class="form-label">Cena w PLN od:</label>
                    <input type="number" class="form-control text-center" id="price_min" name="price_min"
                        value="{{ request('price_min') }}" min="0" step="100" placeholder="Cena minimalna">
                </div>
                <div class="col-md-3">
                    <label for="price_max" class="form-label">Cena w PLN do:</label>
                    <input type="number" class="form-control text-center" id="price_max" name="price_max"
                        value="{{ request('price_max') }}" min="0" step="100" placeholder="Cena maksymalna">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="country" class="form-label">Odwiedzane kraje</label>
                    <select class="form-select" id="country" name="country">
                        <option value="" disabled {{ request('country') ? '' : 'selected' }}>Wybierz...</option>
                        @foreach($trips as $trip)
                        <option value="{{ $trip->country }}"
                                data-trip-id="{{ $trip->id }}"
                                data-trip-name="{{ $trip->trip_name }}"
                                {{ request('country') == $trip->country ? 'selected' : '' }}>
                            {{ $trip->country }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="total_seats" class="form-label">Liczba członków grupy</label>
                    <input type="number" class="form-control text-center" id="total_seats" name="total_seats"
                        value="{{ request('total_seats') }}" min="1">
                </div>
                <div class="col-md-3">
                    <label for="available_seats" class="form-label">Min. liczba wolnych miejsc</label>
                    <input type="number" class="form-control text-center" id="available_seats" name="available_seats"
                        value="{{ request('available_seats') }}" min="0">
                </div>
            </div>

            {{-- przyciski --}}
            <div class="row mt-5">
                <div class="col-md-12 text-end">
                    <button type="reset" class="btn btn-secondary shadow"
                            onclick="window.location.href='{{ route('admin.findtrip') }}'">Wyczyść</button>
                    <button type="submit" class="btn btn-primary shadow mx-4">Szukaj</button>
                    <a href="{{ request()->input('redirect_url', route('admin.triplist')) }}" class="btn btn-success shadow">Powrót</a>
                    {{-- <a href="{{ route('admin.triplist') }}" class="btn btn-success shadow">Powrót</a> --}}
                </div>
            </div>
        </form>
    </div>

    {{-- LISTA --}}
    @if(isset($dates) && $dates->isNotEmpty())
    <div class="row mt-5">
        <div class="container" style="max-width: 1300px;">
            <h4 class="text-center mb-4">Wyniki wyszukiwania</h4>
            <div class="table-term col-12 px-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Kraj</th>
                            <th>Termin</th>
                            <th>Nazwa wyprawy</th>
                            <th>Cena</th>
                            <th>Miejsca</th>
                            <th colspan="3" class="text-center">Akcje</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($dates as $date)
                        <tr>
                            <td>{{ $date->id }}</td>
                            <td>{{ $date->trip->country }}</td>
                            <td>{{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} -
                                {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}</td>
                            <td>{{ $date->trip->trip_name }}</td>
                            <td>{{ $date->price }} PLN</td>
                            <td>{{ $date->available_seats }} wolnych miejsc</td>
                            {{-- przyciski --}}
                            <td>
                                <a href="{{ route('group.show', ['trip_id' => $date->trip->id]) }}" class="btn btn-success btn-sm">Grupa</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.tripdata.edit', ['tripId' => $date->trip_id, 'dateId' => $date->id, 'redirect_url' => url()->current()]) }}" class="btn btn-primary btn-sm shadow">Edycja</a>
                            </td>
                            <td>
                                <form id="deleteForm-{{ $date->id }}" method="POST" action="{{ route('admin.tripdata.destroy', ['tripId' => $date->trip->id, 'dateId' => $date->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
                                    <button type="button" class="btn btn-danger btn-sm shadow deleteButton" data-form-id="deleteForm-{{ $date->id }}">Usuń</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Brak wyników</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    @else
    <h5 class="text-center mt-5">Brak wyników wyszukiwania.</h5>
    @endif
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/tripnames.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault(); // Zatrzymaj domyślne zachowanie przycisku

                    const formId = this.getAttribute('data-form-id');
                    const deleteForm = document.getElementById(formId);

                    Swal.fire({
                        title: 'Czy na pewno?',
                        text: "Nie będziesz mógł cofnąć tej akcji!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Tak, usuń!',
                        cancelButtonText: 'Anuluj'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.submit(); // Wysyłanie formularza tylko po potwierdzeniu
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Anulowano',
                                'Operacja usunięcia została anulowana',
                                'info'
                            );
                        }
                    });
                });
            });
        });
    </script>
@endsection
