<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->text('name');
            $table->string('nicename');
            $table->char('iso', '2');
            $table->char('iso3', '3');
            $table->integer('numcode');
            $table->integer('phonecode');
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
        Schema::dropIfExists('countries');
    }
}
