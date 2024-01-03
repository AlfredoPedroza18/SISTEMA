<?php

namespace App\Console\Commands;

use App\Http\Controllers\Encuestas\notificaciones\emailEncuestasPendientesController;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class taskSendEmailEncuestaPendiente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'encuesta:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'envio de correo a personas que tienen pendientes encuestas nom035';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $notificaciones = new emailEncuestasPendientesController;
        $notificaciones->send();
    }
}
