<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');
Route::view('login', 'login')->name('login');


Route::middleware(['auth'])->group(function () {
    Route::view('library/books', 'books')->name('library.books');
    Route::view('library/loan', 'loans')->name('library.loans');
    Route::view('library/member', 'members')->name('library.members');
});
