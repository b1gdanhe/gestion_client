@extends('layouts.admin.layout')
@section('admin-content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Créer une nouvelle commande</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Colonne de gauche -->
                <div class="space-y-6">
                    <!-- Informations client -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Client</h5>
                        
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-medium text-default-700 mb-1">Client <span class="text-red-500">*</span></label>
                            <select name="client_id" id="client_id" class="form-select w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                                <option value="">Sélectionner un client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->full_name }} - {{ $client->company }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('clients.create') }}" class="btn bg-default-200 text-default-800 hover:bg-default-300 text-sm">
                                <i class="fas fa-plus mr-1"></i> Nouveau client
                            </a>
                        </div>
                    </div>
                    
                    <!-- Articles de la commande -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Articles</h5>
                        
                        <div id="order-items-container">
                            <!-- Les articles seront ajoutés dynamiquement ici -->
                            <div class="order-item mb-4 p-3 border border-default-200 rounded-md">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-6">
                                        <label class="block text-sm font-medium text-default-700 mb-1">Produit</label>
                                        <select name="items[0][product_id]" class="form-select w-full rounded-md border-default-200 focus:border-primary focus:ring-primary product-select" required>
                                            <option value="">Sélectionner un produit</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                    {{ $product->name }} ({{ number_format($product->price, 2, ',', ' ') }} €)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-3">
                                        <label class="block text-sm font-medium text-default-700 mb-1">Quantité</label>
                                        <input type="number" name="items[0][quantity]" value="1" min="1" 
                                               class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary quantity-input" required>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="block text-sm font-medium text-default-700 mb-1">Prix</label>
                                        <input type="text" name="items[0][price]" 
                                               class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary price-input" readonly>
                                    </div>
                                    <div class="col-span-1 flex items-end">
                                        <button type="button" class="btn bg-red-500 text-white hover:bg-red-600 remove-item-btn p-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="add-item-btn" class="btn bg-primary text-white hover:bg-primary-700 text-sm mt-2">
                            <i class="fas fa-plus mr-1"></i> Ajouter un article
                        </button>
                    </div>
                </div>
                
                <!-- Colonne de droite -->
                <div class="space-y-6">
                    <!-- Informations commande -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Informations commande</h5>
                        
                        <div class="mb-4">
                            <label for="order_date" class="block text-sm font-medium text-default-700 mb-1">Date <span class="text-red-500">*</span></label>
                            <input type="date" name="order_date" id="order_date" value="{{ old('order_date', now()->format('Y-m-d')) }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                            @error('order_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-default-700 mb-1">Statut <span class="text-red-500">*</span></label>
                            <select name="status" id="status" class="form-select w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>En traitement</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Terminée</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Paiement -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Paiement</h5>
                        
                        <div class="mb-4">
                            <label for="payment_status" class="block text-sm font-medium text-default-700 mb-1">Statut paiement <span class="text-red-500">*</span></label>
                            <select name="payment_status" id="payment_status" class="form-select w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                                <option value="pending" {{ old('payment_status') == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Payé</option>
                                <option value="failed" {{ old('payment_status') == 'failed' ? 'selected' : '' }}>Échoué</option>
                            </select>
                            @error('payment_status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="payment_method" class="block text-sm font-medium text-default-700 mb-1">Méthode de paiement</label>
                            <input type="text" name="payment_method" id="payment_method" value="{{ old('payment_method') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">
                            @error('payment_method')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Totaux -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Totaux</h5>
                        
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-default-600">Sous-total:</span>
                                <span id="subtotal-display" class="text-sm font-medium">0,00 €</span>
                                <input type="hidden" name="subtotal" id="subtotal" value="0">
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-sm text-default-600">Remise:</span>
                                <div class="flex items-center">
                                    <input type="number" name="discount_amount" id="discount_amount" value="{{ old('discount_amount', 0) }}" min="0" 
                                           class="form-input w-20 rounded-md border-default-200 focus:border-primary focus:ring-primary text-right">
                                    <span class="ml-1 text-sm">€</span>
                                </div>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-sm text-default-600">Taxes:</span>
                                <div class="flex items-center">
                                    <input type="number" name="tax_amount" id="tax_amount" value="{{ old('tax_amount', 0) }}" min="0" 
                                           class="form-input w-20 rounded-md border-default-200 focus:border-primary focus:ring-primary text-right">
                                    <span class="ml-1 text-sm">€</span>
                                </div>
                            </div>
                            
                            <div class="flex justify-between border-t border-default-200 pt-2">
                                <span class="text-sm font-medium text-default-700">Total:</span>
                                <span id="total-display" class="text-sm font-medium">0,00 €</span>
                                <input type="hidden" name="total_amount" id="total_amount" value="0">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notes -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Notes</h5>
                        
                        <div class="mb-4">
                            <textarea name="notes" rows="3" class="form-textarea w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('orders.index') }}" class="btn bg-default-200 text-default-800 hover:bg-default-300">
                    Annuler
                </a>
                <button type="submit" class="btn bg-primary text-white hover:bg-primary-700">
                    Créer la commande
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Variables
    let itemIndex = 1;
    const itemsContainer = document.getElementById('order-items-container');
    const addItemBtn = document.getElementById('add-item-btn');
    
    // Ajouter un nouvel article
    addItemBtn.addEventListener('click', function() {
        const newItem = document.createElement('div');
        newItem.className = 'order-item mb-4 p-3 border border-default-200 rounded-md';
        newItem.innerHTML = `
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-6">
                    <select name="items[${itemIndex}][product_id]" class="form-select w-full rounded-md border-default-200 focus:border-primary focus:ring-primary product-select" required>
                        <option value="">Sélectionner un produit</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} ({{ number_format($product->price, 2, ',', ' ') }} €)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-3">
                    <input type="number" name="items[${itemIndex}][quantity]" value="1" min="1" 
                           class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary quantity-input" required>
                </div>
                <div class="col-span-2">
                    <input type="text" name="items[${itemIndex}][price]" 
                           class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary price-input" readonly>
                </div>
                <div class="col-span-1 flex items-end">
                    <button type="button" class="btn bg-red-500 text-white hover:bg-red-600 remove-item-btn p-2">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        itemsContainer.appendChild(newItem);
        itemIndex++;
        
        // Initialiser les événements pour le nouvel article
        initItemEvents(newItem);
        calculateTotals();
    });
    
    // Supprimer un article
    function initItemEvents(itemElement) {
        const productSelect = itemElement.querySelector('.product-select');
        const quantityInput = itemElement.querySelector('.quantity-input');
        const priceInput = itemElement.querySelector('.price-input');
        const removeBtn = itemElement.querySelector('.remove-item-btn');
        
        // Changer le produit
        productSelect.addEventListener('change', function() {
            if (this.value) {
                const price = this.options[this.selectedIndex].getAttribute('data-price');
                priceInput.value = parseFloat(price).toFixed(2);
                calculateTotals();
            } else {
                priceInput.value = '';
            }
        });
        
        // Changer la quantité
        quantityInput.addEventListener('input', calculateTotals);
        
        // Supprimer l'article
        removeBtn.addEventListener('click', function() {
            itemElement.remove();
            calculateTotals();
        });
    }
    
    // Calculer les totaux
    function calculateTotals() {
        let subtotal = 0;
        const items = document.querySelectorAll('.order-item');
        
        items.forEach(item => {
            const priceInput = item.querySelector('.price-input');
            const quantityInput = item.querySelector('.quantity-input');
            
            if (priceInput.value && quantityInput.value) {
                const price = parseFloat(priceInput.value);
                const quantity = parseInt(quantityInput.value);
                subtotal += price * quantity;
            }
        });
        
        const discount = parseFloat(document.getElementById('discount_amount').value) || 0;
        const tax = parseFloat(document.getElementById('tax_amount').value) || 0;
        const total = subtotal - discount + tax;
        
        // Mettre à jour les affichages
        document.getElementById('subtotal-display').textContent = subtotal.toFixed(2) + ' €';
        document.getElementById('subtotal').value = subtotal.toFixed(2);
        document.getElementById('total-display').textContent = total.toFixed(2) + ' €';
        document.getElementById('total_amount').value = total.toFixed(2);
    }
    
    // Initialiser les événements pour le premier article
    const firstItem = document.querySelector('.order-item');
    if (firstItem) initItemEvents(firstItem);
    
    // Écouter les changements sur les champs de remise et taxes
    document.getElementById('discount_amount').addEventListener('input', calculateTotals);
    document.getElementById('tax_amount').addEventListener('input', calculateTotals);
    
    // Calcul initial
    calculateTotals();
});
</script>
@endsection