<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;    // reguły walidacji

class ClientsController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(ClientRequest $clientRequest)
    {
        $validated = $clientRequest->validated();
        $additionalValidation = request()->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'leader_id' => 'nullable|exists:clients,id',
        ]);
        $data = array_merge($validated, $additionalValidation);

    return Client::create($validated);
    }

    public function show($id)
    {
        return Client::findOrFail($id);
    }

    public function update(ClientRequest $clientRequest, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $clientRequest->validated();
        $additionalValidation = request()->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'leader_id' => 'nullable|exists:clients,id',
        ]);

        $data = array_merge($validated, $additionalValidation);

        $client->update($validated);
        return $client;
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response(null, 204);
    }
}
