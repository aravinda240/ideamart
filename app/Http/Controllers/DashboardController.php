<?php

namespace App\Http\Controllers;

use App\ImApp;
use App\ImAppType;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

    public function index()
    {
        return view('dashboard', ['ownedApps' => Auth::user()->apps]);
    }

//    public function getOwnedApps() {
//        $response = Auth::user()->apps()->get()->toArray();
//        return $response;
//    }
}
