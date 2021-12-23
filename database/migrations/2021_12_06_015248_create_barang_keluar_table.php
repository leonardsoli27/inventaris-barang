<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->increments('id_barang_keluar');
            $table->integer('barang_id')->unsigned();
            $table->integer('pegawai_id')->unsigned();
            $table->string('kode_bk');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('barang_id')->references('id_barang')->on('barang');
            $table->foreign('pegawai_id')->references('id_pegawai')->on('pegawai');
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
