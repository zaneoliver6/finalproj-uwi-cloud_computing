<?php

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
            $table->integer('clientid');
            $table->string('fname');
            $table->string('lname');
            $table->integer('role');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('phonenumber');
            $table->integer('active');
            $table->rememberToken();
            $table->timestamp('lastlogin');
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
        Schema::drop('users');
    }
}
