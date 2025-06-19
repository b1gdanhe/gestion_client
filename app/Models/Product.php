<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Pour le slug

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'sku',
        'is_active',
        'image',
        'category', // N'oublie pas d'inclure les clés étrangères si tu les utilises
        // 'brand_id', // Si tu as ajouté brand_id
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2', // S'assurer que le prix est bien casté en décimal avec 2 décimales
        'is_active' => 'boolean',
        'stock' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Génère le slug avant de sauvegarder le modèle
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) { // Si le nom a changé, met à jour le slug
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
       // return $this->belongsTo(Category::class);
    }

    // Si tu as ajouté une relation Brand
    /*
         public function brand()
         {
         return $this->belongsTo(Brand::class);
         }
         */

    /**
     * Get the formatted price.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ') . ' €'; // Exemple avec euro
    }
}
