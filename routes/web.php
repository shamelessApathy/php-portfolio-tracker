<?php

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
#File: app/Http/routes.php
Route::get('/show-autoloaders', function(){
    foreach(spl_autoload_functions() as $callback)
    {
        if(is_string($callback))
        {
            echo '- ',$callback,"\n<br>\n";
        }

        else if(is_array($callback))
        {
            if(is_object($callback[0]))
            {
                echo '- ',get_class($callback[0]);
            }
            elseif(is_string($callback[0]))
            {
                echo '- ',$callback[0];
            }
            echo '::',$callback[1],"\n<br>\n";            
        }
        else
        {
            var_dump($callback);
        }
    }
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/portfolios', 'PortfolioController');
Route::resource('/transactions', 'TransactionsController');
Route::resource('/positions', 'PositionsController');
Route::get('/home', 'HomeController@index')->name('home');
