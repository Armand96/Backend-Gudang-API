<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BarangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('proyek', 50);
            $table->integer('no_order', false, true);
            $table->string('bengkel', 50);
            $table->string('pekerjaan', 50);
            $table->integer('kode_pekerjaan', false, true);
            $table->date('tgl_keluar');
            $table->string('nomor_barang', 10);
            $table->integer('jml_klr_permintaan_angka', false, true);
            $table->string('jml_klr_permintaan_huruf', 50);
            $table->integer('jml_klr_angka', false, true);
            $table->string('jml_klr_huruf', 50);
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
        Schema::dropIfExists('barang_keluar');
    }
}
