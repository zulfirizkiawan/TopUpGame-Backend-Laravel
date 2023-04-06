<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\NominalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransactionController;
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

//Homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [DashboardController::class]);

        Route::get('/nominal', [NominalController::class, 'index'])->name('nominal');
        Route::get('/nominal/create', [NominalController::class, 'create'])->name('nominal.create');
        Route::post('/nominal', [NominalController::class, 'store'])->name('nominal.store');
        Route::delete('/nominal/{id}', [NominalController ::class, 'destroy'])->name('nominal.destroy');
        Route::get('/nominal/{id}/edit', [NominalController ::class, 'edit'])->name('nominal.edit');
        Route::put('/nominal/{id}', [NominalController ::class, 'update'])->name('nominal.update');

        Route::get('/bank', [BankController::class, 'index'])->name('bank');        
        Route::get('/bank/create', [BankController::class, 'create'])->name('bank.create');
        Route::post('/bank', [BankController::class, 'store'])->name('bank.store');
        Route::delete('/bank/{id}', [BankController ::class, 'destroy'])->name('bank.destroy');
        Route::get('/bank/{id}/edit', [BankController ::class, 'edit'])->name('bank.edit');
        Route::put('/bank/{id}', [BankController ::class, 'update'])->name('bank.update');

        Route::get('/game', [GameController::class, 'index'])->name('game');  
        Route::get('/game/create', [GameController::class, 'create'])->name('game.create');   
        Route::post('/game', [GameController::class, 'store'])->name('game.store');   
        Route::delete('/game/{id}', [GameController ::class, 'destroy'])->name('game.destroy');
        Route::get('/game/{id}', [GameController ::class, 'show'])->name('game.show');
        Route::get('/game/{id}/edit', [GameController ::class, 'edit'])->name('game.edit');
        Route::put('/game/{id}', [GameController ::class, 'update'])->name('game.update');

        Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction'); 
        Route::get('/transaction/{id}', [TransactionController ::class, 'show'])->name('transaction.show');
        Route::post('/transaction/{id}/tolak', [TransactionController ::class, 'tolak'])->name('transaction.tolak');
        Route::put('/transaction/{id}/accept', [TransactionController ::class, 'accept'])->name('transaction.accept');
        Route::put('/transaction/{id}/selesai', [TransactionController ::class, 'selesai'])->name('transaction.selesai');

        Route::get('/user', [UserController::class, 'index'])->name('user'); 
        Route::get('/user/{id}/edit', [UserController ::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController ::class, 'update'])->name('user.update');
    });


Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('logout', 'logout')->name('logout');
});
