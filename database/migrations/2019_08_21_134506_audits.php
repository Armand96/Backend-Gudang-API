<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Audits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user', false. true);
            // $table->string('tipe_audit', 30);
            // $table->string('nomor_barang', 10);
            // $table->integer('barang_keluar_id', false, true);
            // $table->integer('barang_masuk_id', false, true);
            $table->text('nilai_lama');
            $table->text('nilai_baru');
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
        Schema::dropIfExists('audits');
    }
}
