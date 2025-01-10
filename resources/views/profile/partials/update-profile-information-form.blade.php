<section class="form-container shadow">
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            Dane użytkownika
        </h4>
        <p class="text-sm text-gray-600 mt-1">
            Zmień swoje dane i adres email.
        </p>
    </header>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <div class="col-md-4">
                <x-input-label for="name" value="Imię" class="form-label" />
                <x-text-input id="name" name="name" type="text" class="form-control mt-1 block w-full" :value="old('name', $user->name)" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 red-text" />
            </div>
            <div class="col-md-4">
                <x-input-label for="last_name" value="Nazwisko" class="form-label" />
                <x-text-input id="last_name" name="last_name" type="text" class="form-control mt-1 block w-full" :value="old('last_name', $user->last_name)" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 red-text" />
            </div>
            <div class="col-md-4">
                <x-input-label for="email" value="Email" class="form-label" />
                <x-text-input id="email" name="email" type="email" class="form-control mt-1 block w-full" :value="old('email', $user->email)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 red-text" />
            </div>
        </div>

        {{-- Przyciski --}}
        <div class="mt-4 d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-4 shadow">Anuluj</button>
            <button type="submit" class="submit-button btn btn-success me-2 shadow">Zapisz</button>
            <button class="loading-button btn btn-success me-2 shadow" style="display: none;" disabled>
                Zapis...<span class="spinner-border spinner-border-sm ms-3"></span>
            </button>
        </div>
    </form>
</section>

@section('scripts')
    <script src="{{ asset('js/spinner-button2.js') }}"></script>
@endsection
