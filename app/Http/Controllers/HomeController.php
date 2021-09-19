<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(){
        return view('home');
    }

    public function active(Request $request){
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//        auth()->user()->update([
//            'password' => Hash::make($request->password),
//            'email_verified_at' => Carbon::now()
//        ]);
        $user = auth()->user();
        User::query()->where('email', $user->email)->update([
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now(),
            'isActive' => true
        ]);
        auth()->loginUsingId($user->id);
        return redirect(route(auth()->user()->type.'.home'));
    }
}
