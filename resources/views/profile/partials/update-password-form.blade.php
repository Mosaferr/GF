<section class="form-container shadow">
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            Zmień hasło
        </h4>
        <p class="text-sm text-gray-600 mt-1">
            Dla bezpieczeństwa użyj skomplikowanego hasła.
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="row mb-3">
            <div class="col-md-4">
                <x-input-label for="current_password" value="Obecne hasło" class="form-label" />
                <x-text-input id="current_password" name="current_password" type="password" class="form-control mt-1 block w-full" required />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 red-text" />
            </div>
            <div class="col-md-4">
                <x-input-label for="password" value="Nowe hasło" class="form-label" />
                <x-text-input id="password" name="password" type="password" class="form-control mt-1 block w-full" required />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 red-text" />
            </div>
            <div class="col-md-4">
                <x-input-label for="password_confirmation" value="Potwierdź hasło" class="form-label" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control mt-1 block w-full" required />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 red-text" />
            </div>
        </div>

        {{-- Przyciski --}}
        <div class="mt-4 d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-4 shadow">Anuluj</button>
            {{-- <button type="submit" class="btn btn-success me-2 shadow">Zapisz</button> --}}
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
