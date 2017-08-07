<?php

use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('portfolios')->insert([
        	'name'=>'Demo Portfolio',
        	'balance'=>5000.00,
        	'user_id'=>1
        	]);
    }
}
