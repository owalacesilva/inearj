<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ConsumeIneaReportFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:consume-inea-report-files-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::debug('Hourly task started.');

        $folderPath = 'server';

        // $files = Storage::disk('local')->files($folderPath);
        $files = File::files($folderPath);

        foreach ($files as $file) {
            // $fileContent = Storage::disk('local')->get($file);
            $fileContent = File::get($file);

            Log::info('File content: {content}', ['content' => $fileContent]);
        }

        Log::debug('Hourly task finished.');
    }
}
