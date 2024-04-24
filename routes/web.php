<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::prefix('admin')->group(function() {
    Auth::routes();

    Route::middleware('auth')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('games', GameController::class);

        Route::post('users/{user}/make-anonymous', [UserController::class, 'makeAnonymous'])->name('users.make-anonymous');

        Route::get('games/{game}/move-up', [GameController::class, 'moveUp'])->name('games.move-up');
        Route::get('games/{game}/move-down', [GameController::class, 'moveDown'])->name('games.move-down');
    });
});

