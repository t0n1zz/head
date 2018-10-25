<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadPiagamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_piagams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmhs');
            $table->integer('idsyarat');
            $table->string('tipe');
            $table->string('file_name');
            $table->string('exten');
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
        Schema::dropIfExists('upload_piagams');
    }
}
