<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credencials', function (Blueprint $table) {
            $table->id('id_credencial');            
            $table->string('nombre');
            $table->string('apellido');
            $table->string('celular');
            $table->string('grado');
            $table->string('estado');
            $table->string('genero');
            $table->string('grupo_sanguineo');            
            $table->string('carnet_identidad');
            $table->date('fecha_nacimiento');
            $table->string('foto');           
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
        Schema::dropIfExists('credencials');
    }
};
