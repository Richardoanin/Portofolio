<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_barang')->unsigned()->index();
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->integer('id_penerima')->unsigned()->index();
            $table->foreign('id_penerima')->references('id')->on('penerimas')->onDelete('cascade');
            $table->integer('id_pengirim')->unsigned()->index();
            $table->foreign('id_pengirim')->references('id')->on('pengirims')->onDelete('cascade');
            $table->string('nama_layanan');
            $table->string('harga_pengiriman');
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
        Schema::dropIfExists('pengirimen');
    }
}
