<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BarangMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asal_barang', 30);
            $table->string('no_kontrak', 30);
            $table->date('tgl_masuk', 30);
            $table->string('nomor_barang', 30);
            $table->integer('jml_msk_angka', false, true);
            $table->string('jml_msk_huruf', 50);
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
        Schema::dropIfExists('barang_masuk');
    }
}
