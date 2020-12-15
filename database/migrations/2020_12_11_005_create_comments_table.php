<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration CreateCommentsTable qui permet de créer les commentaires
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text', 255);
            $table->foreignId('comment_id')->nullable()->unsigned()
				  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->foreignId('photo_id')->constrained('photos')
				  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->unsigned()
				  ->onUpdate('cascade')
                  ->onDelete('set null');
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
        Schema::dropIfExists('comments');
    }
}
