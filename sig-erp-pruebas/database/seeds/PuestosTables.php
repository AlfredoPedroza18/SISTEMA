<?php

use Illuminate\Database\Seeder;

class PuestosTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Puesto::class,5)->create();
    }
}
