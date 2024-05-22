<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [ProductController::class,'index']);
Route::get('create-product', [ProductController::class, 'createProduct']);
//Insert Product Data
Route::post('insert-product', [ProductController::class, 'insertProduct']);
//Edit Product
Route::get('edit-product/{id}', [ProductController::class, 'editProduct']);
Route::put('update-product/{id}', [ProductController::class, 'updateProduct']);
//Delete Product
Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct']);
