<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamelinkGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create("games", function (Blueprint $table){
         $table->increments("id");
         $table->text("name");
         $table->text("price");
         $table->unsignedInteger("ownerId");
         $table->foreign("ownerId")->references("id")->on("users");
         $table->timestamp("createdAt")->useCurrent();
         $table->text("description");
         $table->longText("image");
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop("games");
     }
}
