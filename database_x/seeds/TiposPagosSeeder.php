<?php

use Illuminate\Database\Seeder;

class TiposPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TipoPago::class,5)->create();
    }
}
