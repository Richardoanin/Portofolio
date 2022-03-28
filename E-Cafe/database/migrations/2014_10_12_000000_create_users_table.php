<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->unique('email');
            $table->string('no_hp');
            $table->string('password');
            $table->enum('role', ['owner', 'pelayan', 'pelanggan'])->default('pelanggan');
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
