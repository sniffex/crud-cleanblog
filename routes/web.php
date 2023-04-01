<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\ProductsController::class, 'index']);
Route::get('create', [App\Http\Controllers\ProductsController::class, 'create']);
Route::post('store', [App\Http\Controllers\ProductsController::class, 'store']);
Route::get('show/{id}', [App\Http\Controllers\ProductsController::class, 'show']);
Route::get('edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit']);
Route::post('update/{id}', [App\Http\Controllers\ProductsController::class, 'update']);
Route::get('delete/{id}', [App\Http\Controllers\ProductsController::class, 'delete']);

// Route::get('/', function () {
//     return view('posts');
// });


