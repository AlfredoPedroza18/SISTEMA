<?php

use Illuminate\Database\Seeder;

class FacturadorasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Facturadora::class,5)->create();
    }
}
