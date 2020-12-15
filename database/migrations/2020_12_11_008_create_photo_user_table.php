<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration CreatePhotoUserTable qui permet de créer les clés composées de la table pivot PhotoUser
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class CreatePhotoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('photo_id')->constrained('photos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->unique(["user_id", "photo_id"]);
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
        Schema::dropIfExists('photo_user');
    }
}
