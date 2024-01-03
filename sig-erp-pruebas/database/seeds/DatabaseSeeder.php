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
        $this->call(CentrosNegocioSeeder::class);
        $this->call(PuestosTables::class);
        $this->call(EjeutivosSeeder::class);
        //$this->call(FacturadorasSeed::class);
        //$this->call(BancosSeed::class);
        //$this->call(TiposPagosSeeder::class);
        $this->call(ClientesSeeder::class);
        
    }
}
