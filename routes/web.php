<?php

use App\Http\Controllers\ActiveUserController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(\route('login'));
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
});

Route::post('/active',[HomeController::class , 'active'])->name('activation');
//\Illuminate\Support\Facades\Auth::routes();
//
//Route::get('mail/{token}',[ActiveUserController::class => 'showResetForm'])->name('active');

//Route::get('/reset-password/{token}', function ($token) {
//    return view('auth.reset-password', ['token' => $token]);
//})->middleware('guest')->name('password.reset');
//
//Route::post('/reset-password', function (Request $request) {
//    $request->validate([
//        'token' => 'required',
//        'email' => 'required|email',
//        'password' => 'required|min:8|confirmed',
//    ]);
//
//    $status = Password::reset(
//        $request->only('email', 'password', 'password_confirmation', 'token'),
//        function ($user, $password) {
//            $user->forceFill([
//                'password' => Hash::make($password)
//            ])->setRememberToken(Str::random(60));
//
//            $user->save();
//
//            event(new PasswordReset($user));
//        }
//    );
//
//    return $status === Password::PASSWORD_RESET
//        ? redirect()->route('login')->with('status', __($status))
//        : back()->withErrors(['email' => [__($status)]]);
//})->middleware('guest')->name('password.update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia::render('Dashboard');
    return redirect(route(auth()->user()->type.'.home'));
})->name('dashboard');
