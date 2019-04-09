<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllocationReceiveTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocation_receive_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('allocation_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();

            $table->string('sets_allocated')->nullable();
            $table->string('stones_allocated')->nullable();

            $table->string('sets_recieved')->nullable();
            $table->string('stones_recieved')->nullable();

            $table->boolean('is_allocation')->nullable();
            $table->boolean('is_recieve')->nullable();

            $table->timestamps();

            $table->foreign('allocation_id')->references('id')->on('allocations');
            $table->foreign('worker_id')->references('id')->on('workers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allocation_receive_transactions');
    }
}
