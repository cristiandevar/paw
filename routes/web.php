<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('galeria.index');
    });

Route::get('/login/google',[App\Http\Controllers\GoogleLoginController::class,'redirect'])->name('login.google-redirect');

Route::get('/login/google/callback',[App\Http\Controllers\GoogleLoginController::class,'callback'])->name('login.google-callback');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return view('panel.index');
})->name('home');

Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
Route::get('products-excel', [ProductController::class, 'exportExcel'])->name('products-excel');
// Route::get('contact-email', [User::class, 'contactEmail'])->name('contact-email');

Route::controller(UserController::class)->group(function(){
    Route::get('users', 'index');
    Route::get('users-export', 'export')->name('users.export');
});
