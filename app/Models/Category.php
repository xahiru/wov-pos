<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tag',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories','categories_id', 'product_id');
    }
}

