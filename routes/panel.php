<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.index');
});

// Route::group(['middleware' => ['role:seller']], function () {
//     Route::resource('/products', ProductController::class)->names('product');
// });
Route::resource('/products', ProductController::class)->names('product');

Route::resource('/users', UserController::class)->names('user');

Route::get('products-pdf',[ProductController::class, 'generatePDF'])->name('products-list-pdf');

Route::get('contact',[UserController::class, 'contact'])->name('user-contact');

Route::post('send-email',[UserController::class, 'sendEmail'])->name('send-email');