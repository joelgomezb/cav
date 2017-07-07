<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('evento', function(Blueprint $table){
        $table->increments('id')->unsigned();
        $table->string('nombre');
        $table->string('descripcion');
        $table->integer('capacidad');
        $table->datetime('fecha_inicio');
        $table->datetime('fecha_fin');
        $table->boolean('estatus')->default(1);
        $table->timestamp('created_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('evento');
    }
}
