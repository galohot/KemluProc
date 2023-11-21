<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        $schedule->command('fetch:data_sirup 2022')->dailyAt('00:00');
        $schedule->command('fetch:data_lpse 2022')->dailyAt('00:10');
        $schedule->command('fetch:data_epurchasing 2022')->dailyAt('00:20');
        $schedule->command('fetch:epurchasing-details 2022')->dailyAt('00:30');
        $schedule->command('fetch:epurchasing-penyedias 2022')->dailyAt('00:50');
        $schedule->command('fetch:epurchasing-distributors 2022')->dailyAt('01:10');
        $schedule->command('fetch:epurchasing-komoditas 2022')->dailyAt('01:30');
        $schedule->command('fetch:data_sirup 2023')->dailyAt('01:50');
        $schedule->command('fetch:data_lpse 2023')->dailyAt('02:00');
        $schedule->command('fetch:data_epurchasing 2023')->dailyAt('02:10');
        $schedule->command('fetch:epurchasing-details 2023')->dailyAt('02:20');
        $schedule->command('fetch:epurchasing-penyedias 2023')->dailyAt('02:50');
        $schedule->command('fetch:epurchasing-distributors 2023')->dailyAt('03:10');
        $schedule->command('fetch:epurchasing-komoditas 2023')->dailyAt('03:30');
    }
    

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}