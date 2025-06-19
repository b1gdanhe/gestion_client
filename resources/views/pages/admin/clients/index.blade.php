@extends('layouts.admin.layout')
@section('admin-content')
<div class="card overflow-hidden">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Liste des Clients</h4>
        <a href="{{ route('clients.create') }}" class="btn bg-slate-800 text-white hover:bg-slate-700">
            <i class="fas fa-plus mr-2"></i>Ajouter un client
        </a>
    </div>
    <div>
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-default-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">ID</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Nom</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Email</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Téléphone</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Entreprise</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Statut</th>
                                <th scope="col" class="px-6 py-3 text-end text-sm text-default-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-default-200">
                            @foreach($clients as $client)
                            <tr class="hover:bg-default-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $client->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $client->photo_url ?? asset('images/default-avatar.png') }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-default-900">{{ $client->first_name }} {{ $client->last_name }}</div>
                                            <div class="text-sm text-default-500">{{ $client->title }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $client->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $client->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $client->company }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $client->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $client->status === 'active' ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium space-x-2">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-default-200">
            {{ $clients->links() }}
        </div>
    </div>
</div>
@endsection