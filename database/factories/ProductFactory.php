<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category; // Si tu as une Category
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productName = $this->faker->unique()->words(rand(2, 4), true); // Génère un nom de produit unique
        $price = $this->faker->randomFloat(2, 10, 1000); // Prix entre 10 et 1000 avec 2 décimales

        // Si tu as une table de catégories, assure-toi qu'elle a des données ou commente cette ligne
      //  $category = Category::inRandomOrder()->first(); // Récupère une catégorie aléatoire

        return [
            'name' => $productName,
            'slug' => Str::slug($productName), // Le slug est aussi généré ici, mais le modèle le fera aussi
            'description' => $this->faker->paragraph(rand(3, 7)), // Paragraphe de 3 à 7 phrases
            'price' => $price,
            'stock' => $this->faker->numberBetween(0, 200), // Stock entre 0 et 200
            'sku' => 'SKU-' . Str::upper(Str::random(8)), // SKU aléatoire
            'is_active' => $this->faker->boolean(90), // 90% de chances d'être actif
            'image' => '', // Chemin relatif, nécessite un répertoire "products" dans storage/app/public
            'category' => 1 , // Assigne une catégorie existante ou null
            // 'brand_id' => Brand::inRandomOrder()->first()->id, // Si tu as des marques
        ];
    }
}