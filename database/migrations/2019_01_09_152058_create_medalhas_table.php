<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedalhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medalhas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('slug');
            $table->string('tipo');
            $table->string('tipo_atividade');
            $table->string('imagem');
            $table->string('quantidade');
            $table->date('periodo_inicio');
            $table->date('periodo_fim');
            $table->longText('texto')->nullable();
            $table->longText('descricao_completa')->nullable();
            $table->integer('ativo');
            $table->integer('criador_id');
            $table->timestamps();
        });
        //ALTER TABLE `medalhas` ADD `periodo_inicio` TIMESTAMP NOT NULL DEFAULT '1970-01-01 00:00:00' AFTER `texto`, ADD `periodo_fim` TIMESTAMP NOT NULL DEFAULT '2035-12-31 23:59:59' AFTER `periodo_inicio`;

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medalhas');
    }
}
