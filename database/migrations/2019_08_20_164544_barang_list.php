<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BarangList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_list', function (Blueprint $table) {
            $table->string('nomor_barang', 10)->unique();
            $table->string('nama_barang', 100);
            $table->string('satuan', 10);
            $table->integer('kuantitas', false, true);
            $table->integer('harga_satuan', false, false);
            $table->string('dibuat_oleh', 10);
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
        Schema::dropIfExists('barang_list');
    }
}
