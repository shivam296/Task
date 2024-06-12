<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\CronJob;
use Illuminate\Support\Facades\Http;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $cronJobs = CronJob::all();

        foreach ($cronJobs as $cronJob) {
            $schedule->call(function () use ($cronJob) {
                
            $response  = Http::get($cronJob->url);
             \Log::info('URL hit. Response: ' . $response->body());
                 
            })->cron($cronJob->frequency);
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
