<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeolocationsController extends Controller
{
    public function index(){
        return view('market.geolocations',['title' => trans('Geolocations')]);
    }
}
