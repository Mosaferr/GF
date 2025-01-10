<!-- resources/views/admin/findclient.blade.php -->
@extends('layouts.app')
@section('title', 'Szukaj klienta')

@section('content')
<main class="custom-margin-top">

    {{-- FORMULARZ --}}
    <div class="form-container">
        <form id="searchForm" method="GET" action="{{ route('admin.findclient') }}">
            @csrf
            <input type="hidden" name="redirect_url" value="{{ request('redirect_url', route('admin.clientlist')) }}">
            <h3 class="my-1" id="header-title">Wyszukaj klienta</h3>
            <hr>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="name" class="form-label">Imię</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">
                </div>
                <div class="col-md-5">
                    <label for="last_name" class="form-label">Nazwisko</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ request('last_name') }}">
                </div>
                <div class="col-md-2">
                    <label for="age_from" class="form-label">Wiek od:</label>
                    <input type="number" class="form-control" id="age_from" name="age_from" value="{{ request('age_from') }}" placeholder="w latach">
                </div>
                <div class="col-md-2">
                    <label for="age_to" class="form-label">Wiek do:</label>
                    <input type="number" class="form-control" id="age_to" name="age_to" value="{{ request('age_to') }}" placeholder="w latach">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-2">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ request('phone') }}">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Adres email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ request('email') }}">
                </div>
                <div class="col-md-3">
                    <label for="expiry_date" class="form-label">Paszport ważny do:</label>
                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ request('expiry_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="invalid_passport_from" class="form-label">Paszport nieważny od:</label>
                    <input type="date" class="form-control" id="invalid_passport_from" name="invalid_passport_from" value="{{ request('invalid_passport_from') }}">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3">
                    <label for="postal_code" class="form-label">Kod</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ request('postal_code') }}">
                </div>
                <div class="col-md-5">
                    <label for="city_name" class="form-label">Miejscowość</label>
                    <input type="text" class="form-control" id="city_name" name="city_name" value="{{ request('city_name') }}">
                </div>
                <div class="col-md-4">
                    <label for="citizenship" class="form-label">Obywatelstwo</label>
                    <select class="form-select" id="citizenship" name="citizenship_id">
                        <option value="" disabled selected>Wybierz...</option>
                        <option value="1" {{ request('citizenship_id') == 1 ? 'selected' : '' }}>Polskie</option>
                        <option value="2" {{ request('citizenship_id') == 2 ? 'selected' : '' }}>Amerykańskie</option>
                        <option value="3" {{ request('citizenship_id') == 3 ? 'selected' : '' }}>Brytyjskie</option>
                        <option value="4" {{ request('citizenship_id') == 4 ? 'selected' : '' }}>Francuskie</option>
                        <option value="5" {{ request('citizenship_id') == 5 ? 'selected' : '' }}>Niemieckie</option>
                        <option value="6" {{ request('citizenship_id') == 6 ? 'selected' : '' }}>Ukraińskie</option>
                        <option value="7" {{ request('citizenship_id') == 7 ? 'selected' : '' }}>Inne</option>
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4">
                    <label for="trip" class="form-label">Wyprawa</label>
                    <select class="form-select" id="trip" name="trip">
                        <option value="" disabled selected>Wybierz...</option>
                        {{-- <option value="all">Wszystkie</option> --}}
                        @foreach($trips as $trip)
                            <option value="{{ $trip->id }}" {{ request('trip') == $trip->id ? 'selected' : '' }}>
                                {{ $trip->destination }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Termin</label>
                    <select class="form-select" id="start_date" name="start_date">
                        <option value="" disabled selected>Wybierz...</option>
                        @foreach($dates as $date)
                            <option value="{{ $date->id }}" {{ request('start_date') == $date->id ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} -
                                {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
                            </option>
                        @endforeach
                    </select>
            </div>
                <div class="col-md-4">
                    <label for="stage" class="form-label">Status</label>
                    <select class="form-select" id="stage" name="stage">
                        <option value="" disabled {{ request('stage') ? '' : 'selected' }}>Wybierz...</option>
                        <option value="zarezerwowany" {{ request('stage') == 'zarezerwowany' ? 'selected' : '' }}>Zarezerwowane</option>
                        <option value="zapisany" {{ request('stage') == 'zapisany' ? 'selected' : '' }}>Podpisano umowę</option>
                        <option value="przedpłacone" {{ request('stage') == 'przedpłacone' ? 'selected' : '' }}>Dokonano przedpłaty</option>
                        <option value="opłacone" {{ request('stage') == 'opłacone' ? 'selected' : '' }}>Wszystko opłacone</option>
                    </select>
                </div>
            </div>

            {{-- przyciski --}}
            <div class="row mt-5">
                <div class="col-md-12 text-end">
                    <button type="reset" class="btn btn-secondary shadow mr-4 px-3"
                    onclick="window.location.href='{{ route('admin.findclient') }}'">
                        Wyczyść
                    </button>
                    <button type="submit" class="btn btn-primary shadow mx-4 px-3">Szukaj</button>
                    <a href="{{ request()->input('redirect_url', route('admin.clientlist')) }}" class="btn btn-success shadow ml-5 px-3">Powrót</a>
                    {{-- <a href="{{ route('admin.clientlist') }}" class="btn btn-success shadow ml-5 px-3">Powrót</a> --}}
                </div>
            </div>
        </form>
    </div>

    {{-- LISTA --}}
    @if(isset($clients) && $clients->isNotEmpty())
        <div class="row mt-5">
            <div class="container" style="max-width: 1300px;">
                <h4 class="text-center mb-4">Wyniki wyszukiwania</h4>
                <div class="table-term col-12 px-4">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nazwisko</th>
                                <th>Imię</th>
                                <th>Data urodzenia</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Ważność paszportu</th>
                                <th colspan="3" class="text-center">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->last_name }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($client->birth_date)->format('d.m.Y') }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->stage ?? 'Brak danych' }}</td>
                                    <td class="text-center">
                                        {{ $client->expiry_date ? \Carbon\Carbon::parse($client->expiry_date)->format('d.m.Y') : 'Brak danych' }}
                                    </td>

                                    <!-- Przyciski -->
                                    <td><a href="{{ route('group.show', ['trip_id' => $client->dates->first()->trip->id]) }}" class="btn btn-success btn-sm">Grupa</a></td>
                                    <td>
                                        <a href="{{ route('admin.clientdata.edit', ['id' => $client->id, 'redirect_url' => url()->current()]) }}" class="btn btn-primary btn-sm">Edycja</a>
                                    </td>
                                    <td>
                                        <form id="deleteForm-{{ $client->id }}" method="POST" action="{{ route('admin.clientdata.destroy', ['id' => $client->id]) }}">
                                            @csrf
                                            @method('DELETE')
											<input type="hidden" name="redirect_url" value="{{ url()->current() }}">
                                            <button type="button" class="btn btn-danger btn-sm shadow deleteButton" data-form-id="deleteForm-{{ $client->id }}">Usuń</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/delete.js') }}" defer></script>               <!-- Skrypt do okienka Usuń -->
@endsection
