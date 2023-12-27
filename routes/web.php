<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'Get_Products')->name('products.index');
    Route::get('/create-products', 'Create_Product')->name('create.product');
    Route::post('/store-products', 'store')->name('store.product');
    Route::get('/products/{id}/edit', 'product_edit')->name('store.product.edit');
    Route::put('/product/{id}/update', 'ProductUpdate')->name('store.product.update');
    Route::delete('/product/{id}/delete', 'Productdelete')->name('store.product.delete');
});
