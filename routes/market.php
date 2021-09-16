<?php

use App\Http\Controllers\Market\{
    HomeController,
    CompanyController,
    GeolocationsController
};
use Illuminate\Support\Facades\Route;

Route::get('auth',function (){
    check_gate('market');
    return response(auth()->user());
})->name('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/geolocations', [GeolocationsController::class, 'index'])->name('geolocations');
