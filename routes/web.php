<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailTestController;

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

Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::get('/signin', [EmailTestController::class, 'store'])->name('email-test.store');

Route::get('/politicadeprivacidade', function () {
    return view('privacy');
});