<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('stocks')->insert([
        	'name'=> 'ATT',
        	'ticker'=>'T',
        	'sector'=>'Telecommunication Services'
        	]);
        DB::table('stocks')->insert([
        	'name'=> 'Verizon',
        	'ticker'=>'V',
        	'sector'=>'Telecommunication Services'
        	]);
    }
}
