<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->timestamps();

            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->text('profile_image')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->unsignedInteger('hook_id')->nullable();

            $table->boolean('status')->default(1);

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
/*
 * Ranjeet kumar maurya
 * Amethitech.
 * India-uttar pradesh (amethi )
 * +977-9804752133, 9868156047
 * ranjeet@amethitech.com
 */
}


