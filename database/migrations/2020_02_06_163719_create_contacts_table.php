<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //crée la table contacts
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');//clé primaire de la table
            $table->timestamps();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_message');
            $table->timestamp('contact_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
