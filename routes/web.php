<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use GuzzleHttp\Promise\Create;

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('about');

});

Route::get('kontak', function () {
    return view('contact');

});

Route::get('/admin',[AdminController::class, 'index'])->name('admin');

Route::get('/category',[CategoryController::class, 'index'])->name('admin.category.index');

Route::get('/category.create',[CategoryController::class,'create'])->name('admin.category.create');

Route::post('/category.store',[CategoryController::class,'store'])->name('admin.category.store');

Route::get('/products',[ProductsController::class, 'index'])->name('admin.products.index');

Route::post('/products.store',[ProductsController::class,'store'])->name('admin.products.store');

Route::get('/products.create',[ProductsController::class,'create'])->name('admin.products.create');

Route::delete('/category{id}', [CategoryController::class,'destroy'])->name('admin.category.destroy');

Route::get('/category/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');

Route::put('/category/{id}', [CategoryController::class,'update'])->name('admin.category.update');

Route::delete('/products/{id}', [ProductsController::class,'destroy'])->name('admin.products.destroy');

Route::get('/products/{id}', [ProductsController::class,'edit'])->name('admin.products.edit');

Route::put('/products/{id}', [ProductsController::class,'update'])->name('admin.products.update');



