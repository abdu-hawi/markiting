<?php

use App\Http\Controllers\Salesman\{
    HomeController
};
use Illuminate\Support\Facades\Route;

Route::get('auth',function (){
    check_gate('salesman');
    return response(auth()->user());
})->name('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');
