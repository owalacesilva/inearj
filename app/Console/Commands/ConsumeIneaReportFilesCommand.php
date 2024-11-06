<?php

namespace App\Console\Commands;

use Exception;
use App\Jobs\ProcessRabbitMQMessage;
use App\Services\ReportService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        $this->handleFilesFromStorage('/CIEM/Telemetria/');

        Log::debug('Hourly task finished.');
    }

    /**
     * Handle files from storage.
     *
     * @param string $folderPath The folder path.
     * @return void
     */
    private function handleFilesFromStorage($folderPath = '')
    {
        $fileSystem = Storage::disk('ftp');
        $files = $fileSystem->files($folderPath);

        foreach ($files as $file) {
            if (!$fileSystem->getVisibility($file) === 'public') {
                continue;
            }

            try {
                $fileContent = $fileSystem->get($file);
    
                Log::info('File content: {content}', ['content' => $fileContent]);
    
                if ($fileContent) {
                    ReportService::processReport($fileContent);
                    // $data = ['content' => $fileContent];
                    // ProcessRabbitMQMessage::dispatch($data);
                }
            } catch(Exception $exception) {
                Log::error('Error processing file: {file}', ['file' => $file, 'exception' => $exception->getMessage()]);
            }
        }
    }

    /**
     * Handle files from local.
     *
     * @param string $folderPath The folder path.
     * @return void
     */
    private function handleFilesFromLocal($folderPath = '')
    {
        $files = File::files($folderPath);

        foreach ($files as $file) {
            $fileContent = File::get($file);

            Log::info('File content: {content}', ['content' => $fileContent]);

            if ($fileContent) {
                $data = ['content' => $fileContent];
                ProcessRabbitMQMessage::dispatch($data);
            }
        }
    }
}
