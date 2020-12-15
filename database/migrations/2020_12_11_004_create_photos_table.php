<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration CreatePhotosTable qui permet de créer les photos
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('file');
            $table->date('date')->nullable();
            $table->string('resolution')->nullable();
            $table->integer('width');
            $table->integer('height');
            $table->foreignId('user_id')->nullable()->unsigned()
				  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->foreignId('group_id')->constrained('groups')
				  ->onUpdate('cascade')
			      ->onDelete('cascade');
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
        Schema::dropIfExists('photos');
    }
}
