<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('name');
            $table->string('nim');
            $table->string('tempat');
            $table->date('tgllahir');
            $table->string('fakultas');
            $table->string('jurusan');    
            $table->string('prodi');    
            $table->integer('semester');    
            $table->integer('ipk');    
            $table->string('norek'); 
            $table->string('nohp'); 
            $table->string('alamat');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kodepos');
            $table->string('namaayah');
            $table->string('statusayah');
            $table->string('namaibu');
            $table->string('statusibu');
            $table->string('pekerjaanortu');
            $table->string('penghasilanortu');
            $table->string('tanggunganortu');
            $table->string('ikutsiapa');
            $table->string('biayakuliah');
            $table->string('kendaraan');
            $table->string('terimapernyataan');
            $table->integer('piagam_nas')->nullable();
            $table->integer('piagam_reg')->nullable();
            $table->integer('piagam_inter')->nullable();
            $table->integer('nilaitopsis')->nullable();
            $table->string('verifikasi')->nullable();
            $table->string('beasiswa')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
}
