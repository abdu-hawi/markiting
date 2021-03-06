<?php

use App\Http\Controllers\Company\{
    HomeController,SalesmenController
};
use Illuminate\Support\Facades\Route;

Route::get('auth',function (){
    check_gate('company');
    return response(auth()->user());
})->name('auth');

Route::get('/active',[HomeController::class , 'active'])->name('active');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/salesmen',[SalesmenController::class , 'index'])->name('salesmen');
