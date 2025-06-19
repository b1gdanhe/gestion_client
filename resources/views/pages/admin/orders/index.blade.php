@extends('layouts.admin.layout')
@section('admin-content')
<div class="card overflow-hidden">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Liste des Commandes</h4>
        <a href="{{ route('orders.create') }}" class="btn bg-slate-800 text-white hover:bg-slate-700">
            <i class="fas fa-plus mr-2"></i>Nouvelle commande
        </a>
    </div>
    <div>
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-default-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">N° Commande</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Client</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Date</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Montant</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Statut</th>
                                <th scope="col" class="px-6 py-3 text-start text-sm text-default-500">Paiement</th>
                                <th scope="col" class="px-6 py-3 text-end text-sm text-default-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-default-200">
                            @foreach($orders as $order)
                            <tr class="hover:bg-default-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    #{{ $order->order_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-default-900">{{ $order->client->full_name ?? 'Client supprimé' }}</div>
                                            <div class="text-sm text-default-500">{{ $order->client->company ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    {{ $order->order_date->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    {{ number_format($order->total_amount, 2, ',', ' ') }} €
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                           ($order->status === 'processing' ? 'bg-blue-100 text-blue-800' : 
                                           ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $order->payment_status === 'paid' ? 'Payé' : 'Impayé' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium space-x-2">
                                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-900" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="text-indigo-600 hover:text-indigo-900" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('orders.invoice', $order->id) }}" class="text-slate-600 hover:text-slate-900" title="Facture">
                                        <i class="fas fa-file-invoice"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-default-200">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection