<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;



class HomeController extends Controller
{
public function index() {
    $categories =  Category::with('products')->get();
    $product =  Products::orderBy('created_at', 'desc')->take(3)->get();
    return view('home', compact('product','categories'));
}

public function detail($id)
{
   try{
      $id = Crypt::decrypt($id);
    }catch(DecryptException $e){
        abort(404);
    }
    $product = Products::FindORFail($id);
    return view('detail', compact('product'));
}
}
