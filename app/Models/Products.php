<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;


class Products extends Model
{
    //


    protected $guarded = [];

    public function index()
        {
            $categories = Category::all();
            return view('home', compact('categories'));
        }

        public function category()
    {
        // Sesuaikan 'Products' dengan nama model produk kamu (Produk atau Products)
        return $this->belongsTo(Category::class);
    }
}
