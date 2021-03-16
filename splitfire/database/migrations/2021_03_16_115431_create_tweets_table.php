<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Construction de la table tweets avec ces colonnes
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('auteur');
            $table->string('message', '1000');
            $table->timestamps();

            //La colonne 'auteur' sera indexer
            $table->index('auteur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
