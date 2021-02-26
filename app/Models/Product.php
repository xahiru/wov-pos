<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amzon_id',
        'name',
        'brand_name',
        'selling_price',
        'quantity',
        'model_number',
        'description',
        'specification',
        'technical_details',
        'weight',
        'dimensions',
        'images',
        'sku',
        'url',
        'stock',
        'detail', 
        'color',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'categories_id');
    }
}

