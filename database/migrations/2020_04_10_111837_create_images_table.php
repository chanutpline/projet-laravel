<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post');//id de l'article lié à l'image
            $table->string('image');//nom de l'image
            $table->timestamps();
            //clé étrangère vers la table users
            $table->foreign('post')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');//délétion en cascade en cas de suppression d'un article
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
