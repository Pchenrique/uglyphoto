<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagens', function (Blueprint $table) {
             $table->Increments('id');
            $table->integer('curtidas');
            $table->string('legenda', 60);
            $table->string('caminho', 60);
            $table->unsignedInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('cascade');
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
        Schema::dropIfExists('postagens');
    }
}
