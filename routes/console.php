<?php

use App\Console\Commands\ConsumeIneaReportFilesCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/**
 * Define the application's command schedule.
 * 
 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
 * @return void
 */
Schedule::command(ConsumeIneaReportFilesCommand::class)->everyMinute();
