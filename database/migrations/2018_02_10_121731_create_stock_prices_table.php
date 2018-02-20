<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockPricesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('exchange_id')->unsigned();
            $table->integer('stocktype_id')->unsigned();
            $table->float('price', false, true);
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('exchange_id')->references('id')->on('exchanges');
            $table->foreign('stocktype_id')->references('id')->on('stocktypes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stock_prices');
    }
}
