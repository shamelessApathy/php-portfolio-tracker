<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->enum('type',['short','long']);
            // Portfolio Foreign Key
            $table->integer('portfolio_id')->unsigned();

            $table->foreign('portfolio_id')->references('id')->on('portfolios');
            // Users Foreign Key
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            // Stocks Foreign Key
            $table->integer('stock_id')->unsigned();

            $table->foreign('stock_id')->references('id')->on('stocks');
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
        //
    }
}
