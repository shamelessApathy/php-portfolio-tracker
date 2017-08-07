<?php

use Illuminate\Database\Seeder;
use App\Transaction;
class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Need to get list of transactions seeds first
        $transactions = Transaction::all();
        foreach ($transactions as $transaction)
        {
        	if ($transaction->action = 'buy')
        	{
        		$type = 'long';
        	}
        	DB::table('positions')->insert([
        		'type' => $type,
        		'quantity' => $transaction->quantity,
        		'stock_id' => $transaction->stock_id,
        		'user_id' => $transaction->user_id,
        		'portfolio_id' => $transaction->portfolio_id,
        		'created_at' => $transaction->created_at
        		]);
        }
    }
}
