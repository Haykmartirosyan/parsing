<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('price')->nullable();
            $table->string('time')->nullable();
            $table->string('league')->nullable();
            $table->string('command')->nullable();
            $table->boolean('win')->nullable();
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
        Schema::dropIfExists('x_matches');
    }
}
