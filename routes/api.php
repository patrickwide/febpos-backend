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
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SaleItemsController;

// Categories Routes
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::get('/categories/{category}', [CategoriesController::class, 'show']);
Route::put('/categories/{category}', [CategoriesController::class, 'update']);
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy']);

// Products Routes
Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products', [ProductsController::class, 'store']);
Route::get('/products/{product}', [ProductsController::class, 'show']);
Route::put('/products/{product}', [ProductsController::class, 'update']);
Route::delete('/products/{product}', [ProductsController::class, 'destroy']);

// Sales Routes
Route::get('/sales', [SalesController::class, 'index']);
Route::post('/sales', [SalesController::class, 'store']);
Route::get('/sales/{sale}', [SalesController::class, 'show']);
Route::put('/sales/{sale}', [SalesController::class, 'update']);
Route::delete('/sales/{sale}', [SalesController::class, 'destroy']);

// SaleItems Routes
Route::get('/sale-items', [SaleItemsController::class, 'index']);
Route::post('/sale-items', [SaleItemsController::class, 'store']);
Route::get('/sale-items/{saleItem}', [SaleItemsController::class, 'show']);
Route::put('/sale-items/{saleItem}', [SaleItemsController::class, 'update']);
Route::delete('/sale-items/{saleItem}', [SaleItemsController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
