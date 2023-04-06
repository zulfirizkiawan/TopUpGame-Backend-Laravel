<?php

use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::post('/checkouttransaction', [TransactionController::class, 'store']);
    Route::get('/transaction', [TransactionController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'getTotalTransactionByCategory']);
    Route::get('/dashboardtransaction/{status}', [DashboardController::class, 'getStatusTransaction']);
    
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('/game', [HomeController::class, 'index']);
Route::get('/game/{id}', [HomeController::class, 'detail']);

Route::get('/bank', [HomeController::class, 'bank']);
