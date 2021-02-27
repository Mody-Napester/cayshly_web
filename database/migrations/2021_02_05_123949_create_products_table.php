<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('brand_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->string('slug')->unique();
            $table->text('name');
            $table->text('details')->nullable();
            $table->string('picture');
            $table->float('price');
            $table->float('points');
            $table->integer('lookup_condition_id');
            $table->string('warranty')->nullable();
            $table->string('video')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('is_active')->default(1);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
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
        Schema::dropIfExists('products');
    }
}
