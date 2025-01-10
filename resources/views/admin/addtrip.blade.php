<!-- resources/views/admin/addtrip.blade.php -->
@extends('layouts.app')
@section('title', 'Dodaj wyprawę')

@section('content')
    <main class="custom-margin-top">
        <div class="form-container">
            <form id="saveForm" method="POST" action="{{ route('admin.addtrip.store') }}">
                @csrf
                <input type="hidden" name="redirect_url" value="{{ request('redirect_url', route('admin.triplist')) }}">
                {{-- <input type="hidden" name="redirect_url" value="{{ url()->previous() }}"> --}}
                <h3 class="mb-0 ms-2">
                    <span id="header-destination">Nowa wyprawa</span>
                    <span class="float-end fs-5 mt-2" id="header-dates"></span>
                </h3>
                <hr>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row mb-2">
                    {{-- <div class="col-auto">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $nextId }}" readonly>
                    </div> --}}
                    <div class="col-md-6">
                        <label for="destination" class="form-label">Destynacja</label>
                        <select class="form-select" id="destination" name="destination" required>
                            <option value="" disabled selected>Wybierz...</option>
                            @foreach($trips as $trip)
                                <option value="{{ $trip->id }}" data-trip-name="{{ $trip->trip_name }}" data-country="{{ $trip->country }}">
                                    {{ $trip->destination }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Data rozpoczęcia</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Data zakończenia</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="trip_name" class="form-label">Nazwa wyprawy</label>
                        <select class="form-select" id="trip_name" name="trip_name" required>
                            <option value="" disabled selected>Wybierz...</option>
                            @foreach($trips as $trip)
                            <option value="{{ $trip->trip_name }}" data-trip-id="{{ $trip->id }}" data-country="{{ $trip->country }}">
                                {{ $trip->trip_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="form-label">Cena w PLN</label>
                        <input type="number" class="form-control text-center" id="price" name="price" required min="0" step="100">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="country" class="form-label">Odwiedzane kraje</label>
                        <select class="form-select" id="country" name="country" required>
                            <option value="" disabled selected>Wybierz...</option>
                            @foreach($trips as $trip)
                            <option value="{{ $trip->country }}" data-trip-id="{{ $trip->id }}" data-trip-name="{{ $trip->trip_name }}">
                                {{ $trip->country }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="total_seats" class="form-label">Liczba członków grupy</label>
                        <input type="number" class="form-control text-center" id="total_seats" name="total_seats" required min="1">
                    </div>
                    <div class="col-md-3">
                        <label for="available_seats" class="form-label">Liczba wolnych miejsc</label>
                        <input type="number" class="form-control text-center" id="available_seats" name="available_seats" readonly>
                    </div>
                </div>

				<div class="row mt-5">
					<div class="col-md-12 text-end">
						<!-- Wyczyść dane -->
						<button type="reset" class="btn btn-secondary shadow mr-4 px-3">Wyczyść</button>
						<!-- Zapisz zmiany -->
						<button type="submit" class="btn btn-primary shadow mx-4 px-3">Zapisz</button>
						<!-- Powrót do listy -->
                        <a href="{{ request('redirect_url', route('admin.triplist')) }}" class="btn btn-success shadow ml-5 px-3">Powrót</a>
						{{-- <a href="{{ route('admin.triplist') }}" class="btn btn-success shadow ml-5 px-3">Powrót</a> --}}
					</div>
				</div>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/tripnames.js') }}" defer></script>
    <script src="{{ asset('js/addtrip.js') }}" defer></script>
@endsection
