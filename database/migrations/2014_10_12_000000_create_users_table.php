<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('parent_id')->unsigned();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('dob')->nullable();
            $table->integer('lookup_gender_id')->nullable()->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->string('activation_code')->nullable();
            $table->integer('num_of_login')->default(0)->nullable();
            $table->timestamp('last_login_date')->nullable();
            $table->rememberToken();
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('users');
    }
}
