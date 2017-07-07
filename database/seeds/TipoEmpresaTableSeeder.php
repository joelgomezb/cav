<?php

use Illuminate\Database\Seeder;

class TipoEmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipo_empresa')->insert([
         'cod_empresa' => '0',
         'descripcion' => 'No Afiliado',
     ]);
      DB::table('tipo_empresa')->insert([
         'cod_empresa' => '1',
         'descripcion' => 'Afiliada CAV',
     ]);

     DB::table('tipo_empresa')->insert([
        'cod_empresa' => '2',
        'descripcion' => 'Afiliada FECOPROSE/CAVECOSE',
    ]);
    }
}
