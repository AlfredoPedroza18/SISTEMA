<?php

use Illuminate\Database\Seeder;

class EjeutivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ejecutivo::class,15)->create();
    }
}
