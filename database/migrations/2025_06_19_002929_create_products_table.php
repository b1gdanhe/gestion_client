<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrémenté, clé primaire
            $table->string('name')->unique(); // Nom du produit, doit être unique
            $table->string('slug')->unique(); // Slug pour les URLs propres (ex: "mon-produit-genial")
            $table->text('description')->nullable(); // Description détaillée du produit
            $table->decimal('price', 10, 2); // Prix du produit (10 chiffres au total, 2 après la virgule)
            $table->integer('stock')->default(0); // Quantité en stock
            $table->string('sku')->unique()->nullable(); // SKU (Stock Keeping Unit), référence unique produit, optionnel
            $table->boolean('is_active')->default(true); // Statut du produit (actif/inactif)
            $table->string('image')->nullable(); // Chemin vers l'image principale du produit
            $table->string('category')->default('Default'); // Clé étrangère vers une table de catégories (si tu en as une)
         
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
