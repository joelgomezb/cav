<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('nacionalidad', array('V','E','P'));
            $table->string('documento_identidad');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', array('M','F'));
            $table->string('codigo_telefono')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->enum('grado_instruccion', array('Bachiller', 'Universitario Graduado', 'Universitario en Curso', 'Especializacion', 'Postgrado Graduado', 'Postgrado en Curso'))->default('Bachiller');
            $table->string('cargo')->nullable();
            $table->integer('cod_empresa')->unsigned();
            $table->string('razon_social')->nullable();
            $table->string('rif')->nullable();
            $table->string('tipo_rif')->nullable();
            $table->string('direccion_fiscal')->nullable();
            $table->string('contacto_facturacion')->nullable();
            $table->string('correo_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->boolean('is_activated')->default(0);
            $table->boolean('estatus')->default(1);
            //$table->foreign('cod_empresa')->references('cod_empresa')->on('empresa');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
