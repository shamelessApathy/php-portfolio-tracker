<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Need to provide path to Schema if we are going to set something with it in the 
// boot function
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Added this line to prevent this error
        // SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was
        // too long; max key length is 767 bytes (SQL: alter table `users` add unique `  
        // users_email_unique`(`email`)) 
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
