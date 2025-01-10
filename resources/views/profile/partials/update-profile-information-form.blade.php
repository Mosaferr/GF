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

        {{-- <div class="mt-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success me-3">Anuluj</button>
            <button type="submit" class="btn btn-danger">Usuń</button>
        </div> --}}
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-success px-4 shadow">Zapisz</button>
            </div>
        </div>
    </form>
</section>
