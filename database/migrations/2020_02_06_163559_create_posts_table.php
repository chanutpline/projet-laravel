<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //crée la table posts
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');//clé primaire de la table
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->date('post_date');
            $table->string('post_content');
            $table->string('post_title');
            $table->string('post_status');
            $table->string('post_name');
            $table->string('post_type');
            $table->string('post_category');
            //clé étrangère vers la table users
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');//délétion en cascade en cas de suppression d'un utilisateur
        });
    }

    /**
     *    $table->bigIncrements('id');
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
