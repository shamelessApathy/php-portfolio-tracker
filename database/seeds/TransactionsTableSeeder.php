<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buy ATT Transaction
        DB::table('transactions')->insert([
        	'action'=>'buy',
        	'price'=>25.00,
        	'quantity'=> 50,
        	'portfolio_id'=>1,
        	'user_id'=>1,
        	'stock_id'=>1,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        // Buy Verizon Transaction
        DB::table('transactions')->insert([
            'action'=>'buy',
            'price'=>35.70,
            'quantity'=> 80,
            'portfolio_id'=>1,
            'user_id'=>1,
            'stock_id'=>2,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
