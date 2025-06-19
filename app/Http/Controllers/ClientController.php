<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('pages.admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('pages.admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'status' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('client-photos', 'public');
        }
        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client créé avec succès');
    }

    public function edit(Client $client)
    {
        return view('pages.admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'status' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($client->photo_path) {
                Storage::disk('public')->delete($client->photo_path);
            }
            $validated['photo_path'] = $request->file('photo')->store('client-photos', 'public');
        }

        $client->update($validated);

        return redirect()->route('pages.admin.clients.index')
            ->with('success', 'Client mis à jour avec succès');
    }

    public function destroy(Client $client)
    {
        if ($client->photo_path) {
            Storage::disk('public')->delete($client->photo_path);
        }

        $client->delete();

        return redirect()->route('pages.admin.clients.index')
            ->with('success', 'Client supprimé avec succès');
    }
}
