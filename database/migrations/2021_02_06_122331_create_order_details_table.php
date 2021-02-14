<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->float('product_price');
            $table->float('product_points');
            $table->integer('product_quantity');
            $table->integer('lookup_deliver_status_id');
            $table->string('deliver_date')->nullable();
            $table->integer('quantity_delivered')->default(0);
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
