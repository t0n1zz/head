<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('iduser');
            $table->increments('idshop');
            $table->increments('idbarber');
            $table->increments('time');   //appointment
            $table->string('service');   //service atau produk
            $table->timestamps('date');
            $table->increments('harga');
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
        Schema::dropIfExists('progress_temps');
    }
}
