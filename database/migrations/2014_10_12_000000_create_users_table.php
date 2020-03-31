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
        //crée la table users
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');//clé primaire de la table
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();//peut être null
            $table->string('password');
            $table->rememberToken();
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
