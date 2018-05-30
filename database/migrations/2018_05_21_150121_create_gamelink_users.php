<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamelinkUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("users", function (Blueprint $table){
        $table->increments("id");
        $table->string("username")->unique();
        $table->text("password");
        $table->rememberToken();
        $table->integer("credit")->default(500);
        $table->timestamp("created_at")->useCurrent();
        $table->timestamp("updated_at")->useCurrent();
        //$table->json("gamesOwned");
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("users");
    }
}
