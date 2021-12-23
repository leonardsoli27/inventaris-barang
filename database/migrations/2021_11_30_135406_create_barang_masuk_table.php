<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->increments('id_barang_masuk');
            $table->string('kode_bm');
            $table->integer('kategori_id')->unsigned();
            $table->integer('pemasok_id')->unsigned();
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('tot_pengeluaran');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id_kategori')->on('kategori');
            $table->foreign('pemasok_id')->references('id_pemasok')->on('pemasok');
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
