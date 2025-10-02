<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('usuarios');

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->unsignedInteger('id_permiso');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_permiso')->references('id')->on('permisos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

