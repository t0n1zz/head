<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobotkriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idkriteria');
            $table->string('opt1');
            $table->float('nilai1');
            $table->string('opt2');
            $table->float('nilai2');
            $table->integer('score');
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
        Schema::dropIfExists('bobotkriterias');
    }
}
