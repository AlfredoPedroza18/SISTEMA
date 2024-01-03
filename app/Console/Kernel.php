<?php

namespace App\Console;

// use App\Console\Commands\sendmailencuesta;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //  Commands\Inspire::class,
        Commands\taskSendEmailEncuestaPendiente::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        // $schedule->command('encuesta:sendmail')
        //          ->timezone("America/Mexico_City")
        //          ->at("11:16")
        //          ->withoutOverlapping();
        $schedule->command('encuesta:sendmail')
                 ->withoutOverlapping();    
    }
}
