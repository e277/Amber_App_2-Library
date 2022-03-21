<?php

use App\Http\Controllers\api\v1\BookController;
use App\Http\Controllers\api\v1\LoanController;
use App\Http\Controllers\api\v1\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books/search/{title}', [BookController::class, 'searchBook']);
Route::get('/members/search/{name}', [MemberController::class, 'searchMember']);


Route::apiResource('/books', BookController::class);
Route::apiResource('/members', MemberController::class);
Route::apiResource('/loans', LoanController::class);