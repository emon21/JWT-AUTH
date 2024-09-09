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

// Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//middleware group routes

// Route::middleware(['UserCheck'])->get('/dashboard', function () {

//     return view('dashboard');
// })->name('dashboard');

// Route::prefix('user')->group(function () {
//     Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

// });

// Route::prefix('dashboard')->group(['middleware' => 'UserMiddleware'], function () {

//     // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

//     Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//     Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
// });


Route::group(['prefix' => 'dashboard', 'middleware' => ['UserMiddleware']], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
});