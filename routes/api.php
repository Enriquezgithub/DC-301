<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasedItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SoldItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{user}',[UserController::class, 'view']);
Route::patch('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}',[UserController::class, 'destroy']);
Route::post('/users',[UserController::class, 'store']);

//supplier
Route::get('/suppliers',[SupplierController::class, 'index']);
Route::get('/suppliers/{supplier}',[SupplierController::class, 'view']);
Route::patch('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::delete('/suppliers/{supplier}',[SupplierController::class, 'destroy']);
Route::post('/suppliers',[SupplierController::class, 'store']);

//purchase
Route::get('/purchases',[PurchaseController::class, 'index']);
Route::get('/purchases/{purchase}',[PurchaseController::class, 'view']);
Route::patch('/purchases/{purchase}', [PurchaseController::class, 'update']);
Route::delete('/purchases/{purchase}',[PurchaseController::class, 'destroy']);
Route::post('/purchases',[PurchaseController::class, 'store']);

//merchandise
Route::get('/merchandises',[MerchandiseController::class, 'index']);
Route::get('/merchandises/{merchandise}',[MerchandiseController::class, 'view']);
Route::patch('/merchandises/{merchandise}', [MerchandiseController::class, 'update']);
Route::delete('/merchandises/{merchandise}',[MerchandiseController::class, 'destroy']);
Route::post('/merchandises',[MerchandiseController::class, 'store']);

//purchased_item
Route::get('/purchased_items',[PurchasedItemController::class, 'index']);
Route::get('/purchased_items/{purchased_item}',[PurchasedItemController::class, 'view']);
Route::patch('/purchased_items/{purchased_item}', [PurchasedItemController::class, 'update']);
Route::delete('/purchased_items/{purchased_item}',[PurchasedItemController::class, 'destroy']);
Route::post('/purchased_items',[PurchasedItemController::class, 'store']);

//customer
Route::get('/customers',[CustomerController::class, 'index']);
Route::get('/customers/{customer}',[CustomerController::class, 'view']);
Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}',[CustomerController::class, 'destroy']);
Route::post('/customers',[CustomerController::class, 'store']);

//sale
Route::get('/sales',[SaleController::class, 'index']);
Route::get('/sales/{sale}',[SaleController::class, 'view']);
Route::patch('/sales/{sale}', [SaleController::class, 'update']);
Route::delete('/sales/{sale}',[SaleController::class, 'destroy']);
Route::post('/sales',[SaleController::class, 'store']);

//sold_item
Route::get('/sold_items',[SoldItemController::class, 'index']);
Route::get('/sold_items/{sold_item}',[SoldItemController::class, 'view']);
Route::patch('/sold_items/{sold_item}', [SoldItemController::class, 'update']);
Route::delete('/sold_items/{sold_item}',[SoldItemController::class, 'destroy']);
Route::post('/sold_items',[SoldItemController::class, 'store']);


