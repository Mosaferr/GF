<section class="form-container shadow space-y-6">
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            Usuń konto
        </h4>
        <p class="text-sm text-gray-600 mt-1">
            Po usunięciu konta, nie bedziesz mógł zalogować się do serwisu.
        </p>
    </header>
    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
        @csrf
        @method('delete')
        <x-input-label for="password" value="Hasło" class="form-label" />
        {{-- <x-text-input id="password_user" type="password" name="password" class="form-control mt-1 block w-3/4" required /> --}}
        <x-text-input id="password" type="password" name="password" class="form-control mt-1 block w-3/4" required />
        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 red-text" />

        {{-- Przyciski --}}
        <div class="mt-4 d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-4 shadow">Anuluj</button>
            <button type="submit" class="submit-button btn btn-danger me-2 px-3 shadow">Usuń</button>
            <button class="loading-button btn btn-danger me-2 px-3 shadow" style="display: none;" disabled>
                Usuwanie...<span class="spinner-border spinner-border-sm ms-3"></span>
            </button>
        </div>
    </form>
</section>

@section('scripts')
    <script src="{{ asset('js/spinner-button2.js') }}"></script>
@endsection
