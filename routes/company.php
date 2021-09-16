<?php

use App\Http\Controllers\Company\{
    HomeController
};
use Illuminate\Support\Facades\Route;

Route::get('auth',function (){
    check_gate('company');
    return response(auth()->user());
})->name('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');
