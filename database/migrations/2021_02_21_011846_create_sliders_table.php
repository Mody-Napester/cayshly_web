<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('image');
            $table->text('text_1');
            $table->text('text_2');
            $table->text('text_3');
            $table->text('button_1_text');
            $table->string('button_1_link');
            $table->text('button_2_text');
            $table->string('button_2_link');
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('sliders');
    }
}
