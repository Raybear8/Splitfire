<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Migrationn de la table Tags
class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
            $table->timestamps();
        });

        DB::table('tags')->insert([
            ['tag' => '#Bonjour'],
            ['tag' => '#Metoo'],
            ['tag' => '#Jeux'],
            ['tag' => '#Livre'],
            ['tag' => '#Informatique'],
            ['tag' => '#Php'],
            ['tag' => '#Javascript'],
            ['tag' => '#Splitfire'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
