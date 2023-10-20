<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\PDFController;

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

