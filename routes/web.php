<?php

use App\Http\Controllers\MyBanks\MyBanksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionHistory\TransactionHistoryController;
use App\Http\Controllers\TransferFunds\TransferFundsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function(){
    return Inertia::render('Root/Index');
});

Route::resource('/my-banks', MyBanksController::class);
Route::resource('/transaction-history', TransactionHistoryController::class);
Route::resource('/payment-transfer', TransferFundsController::class);

Route::get('/sign-in', function(){
    return Inertia::render('Auth/SignIn/Index');
});

Route::get('/sign-up', function(){
    return Inertia::render('Auth/SignUp/Index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


