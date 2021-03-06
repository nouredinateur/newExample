<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('login', [AuthController::class, 'authenticate'])->name('login');
// Route::post('register', [AuthController::class, 'register'])->name('register');

// Route::group(['middleware' => ['jwt.verify']], function() {
//     Route::get('logout', [AuthController::class, 'logout']);
//     Route::get('get_user', [AuthController::class, 'get_user']);
//     // Route::get('products', [ProductController::class, 'index']);
//     // Route::get('products/{id}', [ProductController::class, 'show']);
//     // Route::post('create', [ProductController::class, 'store']);
//     // Route::put('update/{product}',  [ProductController::class, 'update']);
//     // Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('register',  [AuthController::class, 'register'])->name('register');
    Route::post('login',  [AuthController::class, 'login'])->name('login');
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',  [AuthController::class, 'me']);
    Route::post('payload',  [AuthController::class, 'payload']);

});