<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            // $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_menu');
            // $table->foreign('id_menu')->references('id')->on('menu');
            $table->string('jumlah');
            $table->longText('catatan');
            $table->enum('status', ['waiting', 'proses', 'selesai'])->default('waiting');
            $table->string('subtotal', 20);
        });
    }
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
