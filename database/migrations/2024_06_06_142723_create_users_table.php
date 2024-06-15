<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration    
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama', 25);
            $table->string('email', 30)->unique();
            $table->enum('role', ['Admin', 'Pimpinan', 'Dosen', 'Staff', 'Mahasiswa']);
            $table->string('password', 20);
            $table->boolean('status');
            $table->dateTime('last_login')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
