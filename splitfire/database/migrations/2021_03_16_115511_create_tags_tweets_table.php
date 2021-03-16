<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Migration de la table des liaisions entre des tweets et des tags
class CreateTagsTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_tweets', function (Blueprint $table) {
            $table->id();
            $table->integer('tags_id');
            $table->integer('tweets_id');
            $table->timestamps();
            /*$table->foreign('tweets_id')->references('id')->on('tweets');
            $table->foreign('tags_id')->references('id')->on('tags');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_tweets');
    }
}
