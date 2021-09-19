<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
     * @return Application|Renderable|RedirectResponse|Redirector
     */
    public function index(){
        if( is_null(auth()->user()->email_verified_at) )  return redirect(route('company.active')) ;
        return view('company.home', ['title' => 'main']);
    }

    public function active(){
        return view('company.active');
    }
}
