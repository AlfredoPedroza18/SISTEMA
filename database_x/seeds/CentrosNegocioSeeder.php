<?php

use Illuminate\Database\Seeder;

class CentrosNegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CentroNegocio::class,10)->create();
    }
}
