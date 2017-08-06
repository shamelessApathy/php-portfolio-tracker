<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Transaction;
use App\Portfolio;
use App\User;


class PortfolioController extends Controller
{
    //
    public function index()
    {
    	$portfolios = \Auth::user()->portfolio;
    	return view('portfolios.index')->with('portfolios',$portfolios);
    }
    public function create()
    {
    	return view('portfolios.create');
    }
    // This is where view portfolios.create sends form data automatically via action='/portfolios' with no further method defined
    public function store(Request $request)
    {
    	$user = \Auth::user()->id;
    	$portfolio = new Portfolio();
    		$portfolio->name  = $request->name;
    		$portfolio->balance = $request->balance;
    		$portfolio->user_id = $user;
    		$portfolio->save();
    }
    public function show($id)
    {
    	$portfolio = Portfolio::find($id);
    	return view('portfolios.show')->with('portfolio', $portfolio);
    } 
}
