<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemsController;

// Categories Routes
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::get('/categories/{category}', [CategoriesController::class, 'show']);
Route::put('/categories/{category}', [CategoriesController::class, 'update']);
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy']);

// Products Routes
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

// Sales Routes
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);
Route::get('/sales/{sale}', [SaleController::class, 'show']);
Route::put('/sales/{sale}', [SaleController::class, 'update']);
Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);

// SaleItems Routes
Route::get('/sale-items', [SaleItemsController::class, 'index']);
Route::post('/sale-items', [SaleItemsController::class, 'store']);
Route::get('/sale-items/{saleItem}', [SaleItemsController::class, 'show']);
Route::put('/sale-items/{saleItem}', [SaleItemsController::class, 'update']);
Route::delete('/sale-items/{saleItem}', [SaleItemsController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
