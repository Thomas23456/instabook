<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration CreatePhotoTagTable qui permet de créer les clés composées de la table pivot PhotoTag
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class CreatePhotoTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('photo_id')->constrained('photos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->unique(["tag_id", "photo_id"]);
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
        Schema::dropIfExists('photo_tag');
    }
}
