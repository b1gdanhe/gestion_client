@extends('layouts.admin.layout')
@section('admin-content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Ajouter un nouveau client</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Colonne de gauche -->
                <div class="space-y-6">
                    <!-- Informations de base -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Informations personnelles</h5>
                        
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-default-700 mb-1">Prénom <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-default-700 mb-1">Nom <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-default-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-default-700 mb-1">Téléphone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Photo de profil -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Photo de profil</h5>
                        
                        <div class="flex items-center space-x-4">
                            <div class="shrink-0">
                                <img id="preview-photo" class="h-16 w-16 rounded-full object-cover" 
                                     src="{{ asset('images/default-avatar.png') }}" alt="Photo preview">
                            </div>
                            <div class="flex-1">
                                <label class="block">
                                    <span class="sr-only">Choisir une photo</span>
                                    <input type="file" name="photo" id="photo" 
                                           class="block w-full text-sm text-default-500
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-md file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-primary file:text-white
                                                  hover:file:bg-primary-700">
                                </label>
                                @error('photo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Colonne de droite -->
                <div class="space-y-6">
                    <!-- Informations professionnelles -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Informations professionnelles</h5>
                        
                        <div class="mb-4">
                            <label for="company" class="block text-sm font-medium text-default-700 mb-1">Entreprise</label>
                            <input type="text" name="company" id="company" value="{{ old('company') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-default-700 mb-1">Poste</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                   class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Adresse -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Adresse</h5>
                        
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-default-700 mb-1">Adresse</label>
                            <textarea name="address" id="address" rows="2" 
                                      class="form-textarea w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="city" class="block text-sm font-medium text-default-700 mb-1">Ville</label>
                                <input type="text" name="city" id="city" value="{{ old('city') }}" 
                                       class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">
                                @error('city')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="zip_code" class="block text-sm font-medium text-default-700 mb-1">Code postal</label>
                                <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" 
                                       class="form-input w-full rounded-md border-default-200 focus:border-primary focus:ring-primary">
                                @error('zip_code')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Statut -->
                    <div class="bg-default-50 p-4 rounded-lg">
                        <h5 class="text-lg font-medium text-default-700 mb-4">Statut</h5>
                        
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input id="status-active" name="status" type="radio" value="1" 
                                       class="h-4 w-4 text-primary focus:ring-primary" checked>
                                <label for="status-active" class="ml-2 block text-sm font-medium text-default-700">
                                    Actif
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="status-inactive" name="status" type="radio" value="o"
                                       class="h-4 w-4 text-primary focus:ring-primary">
                                <label for="status-inactive" class="ml-2 block text-sm font-medium text-default-700">
                                    Inactif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('clients.index') }}" class="btn bg-default-200 text-default-800 hover:bg-default-300">
                    Annuler
                </a>
                <button type="submit" class="btn bg-primary text-white hover:bg-primary-700">
                    Enregistrer le client
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Aperçu de la photo avant upload
    document.getElementById('photo').addEventListener('change', function(e) {
        const preview = document.getElementById('preview-photo');
        const file = e.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
        } else {
            preview.src = "{{ asset('images/default-avatar.png') }}";
        }
    });
</script>
@endsection