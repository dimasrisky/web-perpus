<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [ AuthController::class, 'login' ]);
Route::get('/register', [ AuthController::class, 'createUser' ]);

// Route::group(['middleware' => 'auth:sanctum'], function(){
// });
Route::get('/logout', [ AuthController::class, 'logout' ]);
Route::apiResource('/users', UserController::class)->except('create', 'edit')->parameter('users', 'id');
Route::apiResource('/buku',  BukuController::class)->except('create', 'edit')->parameter('buku', 'id');
Route::get('/kategori', [ KategoriController::class, 'index' ]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
