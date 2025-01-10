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
                {{-- <thead>
                    <tr>
                        <th></th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Data urodzenia</th>
                    </tr>
                </thead> --}}
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>
                                <input type="checkbox" name="client_ids[]" value="{{ $client->id }}" />
                            </td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->last_name }}</td>
                            {{-- <td class="text-center">{{ \Carbon\Carbon::parse($client->birth_date)->format('d.m.Y') }}</td> --}}
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
        <x-text-input id="password" type="password" name="password" class="form-control mt-1 block w-3/4" required />
        <x-input-error :messages="$errors->clientDeletion->get('password')" class="mt-2 red-text" />

        <div class="mt-3 d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-4 shadow">Anuluj</button>
            <button type="submit" class="btn btn-danger me-2 shadow">Usuń</button>
        </div>
    </form>
</section>
