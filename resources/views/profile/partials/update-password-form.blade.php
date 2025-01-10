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
        <div class="mt-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-success px-4 me-2 shadow">Zapisz</button>
        </div>
    </form>
</section>
