<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('slug')->unique();
            $table->text('name');
            $table->text('details')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('picture')->nullable();
            $table->string('cover')->nullable();
            $table->boolean('is_authorized')->default(1);
            $table->boolean('is_active')->default(1);
            $table->integer('views')->unsigned()->default(0);
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
        Schema::dropIfExists('stores');
    }
}
