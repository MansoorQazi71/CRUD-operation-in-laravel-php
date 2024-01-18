<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
// Route::get('/products/{{$product->id}}/edit', [ProductController::class, 'edit']);
Route::post('/store', [ProductController::class, 'store']);
Route::put('/products/{id}/update', [ProductController::class, 'update']);
Route::get('/products/{id}/delete', [ProductController::class, 'delete']);
Route::delete('/products/{id}/delete', [ProductController::class, 'delete']);
Route::get('/products/{id}/show', [ProductController::class, 'show']);

//api routes

Route::middleware('auth:api')->get('/user',function(Request $request){
    return $request->user();
});
Route::get('/books',[BookController::class,'index']);
Route::get('/newBook', [BookController::class, 'create']);
Route::post('/storeBook', [BookController::class, 'storeBook']);
Route::get('/books/{id}',[BookController::class,'show']);
Route::get('/books/{id}/edit', [BookController::class, 'edit']);
Route::post('/newBook',[BookController::class,'storeBook']);
Route::put('/books/{id}/update',[BookController::class,'update']);
Route::delete('/books/{id}/destroy',[BookController::class,'destroy']);