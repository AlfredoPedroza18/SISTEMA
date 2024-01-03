<?php

use Illuminate\Database\Seeder;

class BancosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Banco::class,10)->create();
    }
}
