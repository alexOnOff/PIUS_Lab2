<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table){
            $table->increments('id')->unique();
            #$table->foreign('id')->references('article_id')->on('article__tags');
            $table->string("name");
            $table->string("symbolcode");
            $table->string("content");
            $table->dateTime("create_time");
            $table->string("author");
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
