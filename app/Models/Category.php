<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        // Sesuaikan 'Products' dengan nama model produk kamu (Produk atau Products)
        return $this->hasMany(Products::class, 'category_id');
    }
}
