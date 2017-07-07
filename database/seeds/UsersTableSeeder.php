<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'nombre' => 'Joel E',
            'apellido' => 'Gomez B',
            'nacionalidad' => 'V',
            'documento_identidad' => '14174747',
            'email' => 'joelgomezb@gmail.com',
            'password' => bcrypt('123321...'),
            'fecha_nacimiento' => '1979-10-28',
            'genero' => 'M',
            'codigo_telefono' => '58212',
            'telefono' => '2729639',
            'celular' => '04166183868',
            'grado_instruccion' => 'Universitario Graduado',
            'cargo' => 'Coordinador',
            'cod_empresa' => '1',
            'razon_social' => 'Turismo',
            'tipo_rif' => 'J',
            'rif' => '141747475',
            'direccion_fiscal' => 'El Rosal',
            'contacto_facturacion' => 'Pedro Perez',
            'correo_contacto' => 'pedroperez@gmail.com',
            'telefono_contacto' => '021212345678',
            'is_activated' => 1
        ]);
    }
}
