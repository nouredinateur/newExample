<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('admin.dashboard');
})->name('home');

Route::get('/login', function() {
    return view('auth.login');
});
Route::get('/register', function() {
    return view('auth.register');
});

Route::post('login', [AuthController::class, 'authenticate'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout']);
Route::get('get_user', [AuthController::class, 'get_user']);

Route::group(['middleware' => ['jwt.verify']], function() {
    // Route::get('logout', [AuthController::class, 'logout']);
    // Route::get('get_user', [AuthController::class, 'get_user']);
});