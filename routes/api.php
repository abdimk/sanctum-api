<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/products',[ProductController::class, 'index']);


// //store
// ROute::post('/products', [ProductController::class, 'store']);


Route::resource('/products', ProductController::class);

// Search Route
//Route::get('/products/search/{name}', [ProductController::class, 'search']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/products/search/{name}', [ProductController::class, 'search']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
