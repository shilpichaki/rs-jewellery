<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawMaterialStockTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material_stock_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stock_id')->index()->unsigned();
            $table->bigInteger('vendor_id')->index()->unsigned();
            $table->bigInteger('user_id')->index()->unsigned();

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
        Schema::dropIfExists('raw_material_stock_transactions');
    }
}
