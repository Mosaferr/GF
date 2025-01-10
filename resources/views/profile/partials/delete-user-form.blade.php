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
        <x-text-input id="password" type="password" name="password" class="form-control mt-1 block w-3/4" required />
        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 red-text" />
        <div class="mt-3 d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-4 shadow">Anuluj</button>
            <button type="submit" class="btn btn-danger me-2 shadow">Usuń</button>
        </div>
    </form>
</section>
