<?php

use Illuminate\Database\Seeder;

class EventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('evento')->insert([
            'nombre' => 'Evento Exposicion1',
            'descripcion' => 'Evento para mostrar las potencialidad del CAV',
            'capacidad' => 20,
            'fecha_inicio' => '2017-06-06 08:00:00',
            'fecha_fin' => '2017-06-06 10:00:00',
            'estatus' => 1,
        ]);

         DB::table('evento')->insert([
            'nombre' => 'Evento Exposicion2',
            'descripcion' => 'Evento para mostrar las potencialidad del CAV',
            'capacidad' => 20,
            'fecha_inicio' => '2017-06-06 08:00:00',
            'fecha_fin' => '2017-06-06 10:00:00',
            'estatus' => 1,
        ]);
         DB::table('evento')->insert([
            'nombre' => 'Evento Exposicion3',
            'descripcion' => 'Evento para mostrar las potencialidad del CAV',
            'capacidad' => 20,
            'fecha_inicio' => '2017-06-06 08:00:00',
            'fecha_fin' => '2017-06-06 10:00:00',
            'estatus' => 1,
        ]);
    }
}
