<section class="form-container shadow space-y-6">
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            Usuń dane
        </h4>
        <p class="text-sm text-gray-600 mt-1">
            Usunięcie danych jest bezpowrotne. Zaznacz, którego uczestnika dane mają być usunięte.
        </p>
    </header>
    <form method="post" action="{{ route('clients.delete') }}" class="mt-6">
        @csrf
        @method('delete')

        <!-- Lista klientów z checkboxami -->
        <div class="mt-4">
            <table class="table table-bordered">
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>
                                <input type="checkbox" name="client_ids[]" value="{{ $client->id }}" />
                            </td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->last_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Brak klientów do wyświetlenia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="text-sm text-gray-600 mt-2">
            Usunięcie danych oznacza rezygnację z wycieczki.
        </p>

        <x-input-label for="password" value="Hasło" class="form-label" />
        {{-- <x-text-input id="password_client" type="password" name="password" class="form-control mt-1 block w-3/4" required /> --}}
        <x-text-input id="password" type="password" name="password" class="form-control mt-1 block w-3/4" required />
        <x-input-error :messages="$errors->clientDeletion->get('password')" class="mt-2 red-text" />

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

