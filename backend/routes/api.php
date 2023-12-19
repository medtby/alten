<?php

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
//Recupo les produits
Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'index']);

//Recuperer un produit spécifique
Route::get('/products/{id}', [App\Http\Controllers\Api\ProductController::class, 'show']);

// Mettre à jour un produit
Route::put('/products/{id}', [App\Http\Controllers\Api\ProductController::class, 'update']);

// Créer un produit
Route::post('/products', [App\Http\Controllers\Api\ProductController::class, 'store']);

// Supprimer un produit 
Route::delete('/products/{id}', [App\Http\Controllers\Api\ProductController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
