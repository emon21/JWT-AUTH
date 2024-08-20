<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home');
});


//user-registration
Route::get('user-create', [UserController::class, 'UserCreate']);
Route::post('user-registration', [UserController::class, 'UserRegistration'])->name('user-registration');

//user-login
Route::get('user-login', [UserController::class, 'UserLogin'])->name('user-login');
Route::post('login', [UserController::class, 'Login'])->name('login');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

