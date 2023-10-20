<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('/products', ProductController::class)->names('product');
Route::get('products-pdf',[App\Http\Controllers\ProductController::class, 'generatePDF'])->name('products-list-pdf');