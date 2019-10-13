<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengadaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_spp', 8);
            $table->string('proyek', 20);
            $table->string('no_order', 10);
            $table->dateTime('tgl_pengadaan');
            $table->dateTime('tgl_penerimaan');
            $table->string('nama_barang', 120);
            $table->integer('jml_diminta', false, true);
            $table->string('satuan', 10);
            $table->string('keterangan', 100);
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
        Schema::dropIfExists('pengadaan');
    }
}
