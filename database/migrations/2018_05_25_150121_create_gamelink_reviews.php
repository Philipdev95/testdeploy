<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamelinkReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create("reviews", function (Blueprint $table){
         $table->increments("reviewId");
         $table->unsignedInteger("gameId");
         $table->foreign("gameId")->references("id")->on("games");
         $table->unsignedInteger("userId");
         $table->foreign("userId")->references("id")->on("users");
         $table->integer("rating");
         $table->text("review");
         $table->timestamp("createdAt")->useCurrent();
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop("reviews");
     }
}
