<?php

use App\Http\Controllers\AutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\ProizvodjacController;
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

Route::resource('autos', AutoController::class);
Route::resource('kategorijas', KategorijaController::class);
Route::resource('proizvodjacs', ProizvodjacController::class);
Route::resource('users', UserController::class);

Route::post('/register',[UserController::class,'store']);
