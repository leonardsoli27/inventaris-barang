<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('kategori_id')->unsigned();
            $table->integer('pemasok_id')->unsigned();
            $table->string('kode_barang');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('harga_ambil');
            $table->string('gambar')->default(null);
            $table->timestamps();

            $table->foreign('pemasok_id')->references('id_pemasok')->on('pemasok');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
