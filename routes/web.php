<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductController::class,"Get_Products"])->name("products.index");
Route::get('/create-products',[ProductController::class,"Create_Product"])->name("create.product");
Route::post('/store-products',[ProductController::class,"store"])->name("store.product");
Route::get('/products/{id}/edit',[ProductController::class,"product_edit"])->name("store.product.edit");