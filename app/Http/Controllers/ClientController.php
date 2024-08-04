<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10); 
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');    
    }

    public function store(StoreClientRequest $request)
    {
        $validatedData = $request->validated(); 

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client added successfully');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $validatedData = $request->validated(); 

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }
}
