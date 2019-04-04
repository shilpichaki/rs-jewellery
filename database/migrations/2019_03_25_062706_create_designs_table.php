<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('design_no')->unique()->unsigned();
            $table->double('rhodium', 8, 2);
            $table->integer('markup_percentage');
            $table->double('misc_price', 8, 2);
            $table->double('price_4pcs', 8, 2);
            $table->text('stones');
            $table->text('total_stone_count');
            $table->string('picture')->nullable();
            $table->string('unique_stone_colors')->nullable();
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
        Schema::dropIfExists('designs');
    }
}
