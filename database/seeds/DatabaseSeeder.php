<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(EmpresaTableSeeder::class);
         $this->call(TipoEmpresaTableSeeder::class);
         $this->call(EventoTableSeeder::class);
    }
}
