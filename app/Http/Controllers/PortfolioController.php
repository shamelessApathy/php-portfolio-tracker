<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    public function index()
    {
    	return view('portfolios/index');
    }
    public function create()
    {
    	return view('portfolios.create');
    }
    // This is where view portfolios.create sends form data automatically via action='/portfolios' with no further method defined
    public function store()
    {
    	
    }
}
