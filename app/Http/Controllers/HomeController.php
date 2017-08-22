<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CryptoController;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptocontroller = new CryptoController();
        $minerinfo = $cryptocontroller->getMinerInfo();
        
        // Send miner info to home page for display
        return view('home')->with('minerinfo', $minerinfo);
    }
}
