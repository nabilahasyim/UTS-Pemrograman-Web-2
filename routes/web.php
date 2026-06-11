<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', [CategoryController::class, 'index']);

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);

Route::get('/products-trash', [ProductController::class, 'trash'])
    ->name('products.trash');