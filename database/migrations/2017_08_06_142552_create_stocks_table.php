<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ticker')->unique();
            $table->string('comment')->nullable();
            $table->enum('sector', [
                'Consumer Discretionary', 
                'Consumer Staples',
                'Energy',
                'Financials',
                'Health Care',
                'Industrials',
                'Information Technology',
                'Materials',
                'Telecommunication Services',
                'Utilities'
                ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
