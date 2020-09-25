<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('strava_activity')->nullable();
            $table->integer('user_id');
            $table->string('type');
            $table->float('distance',10,2)->nullable();
            $table->string('name')->nullable();
            $table->integer('elapsed_time')->nullable();
            $table->integer('total_elevation_gain')->nullable();
            $table->integer('moving_time')->nullable();
            $table->string('start_date_local')->nullable();
            $table->string('location_city')->nullable();
            $table->string('location_state')->nullable();
            $table->string('location_country')->nullable();
            $table->string('start_latlng')->nullable();
            $table->string('end_latlng')->nullable();
            $table->string('map_id')->nullable();
            $table->longText('map_polyline')->nullable();
            $table->boolean('private')->nullable();
            $table->string('visibility')->nullable();
            $table->integer('calories')->nullable();
            $table->float('average_speed',10,2)->nullable();
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
        Schema::dropIfExists('atividades');
    }
}
