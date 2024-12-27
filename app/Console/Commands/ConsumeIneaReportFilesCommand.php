<?php

namespace App\Console\Commands;

use Exception;
use App\Jobs\ProcessRabbitMQMessage;
use App\Services\ReportService;
use Carbon\Carbon;
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

        $todayDate = Carbon::now()->format('ymd');

        // /(\d{1,})_(241227)(\d{3,4})\.(txt)/gsm
        $pattern = '/(\d{1,})_(' . $todayDate . ')(\d{3,4})\.(txt)/';
        $matchedFiles = array_filter($files, function($file) use ($pattern) {
            return preg_match($pattern, $file);
        });

        Log::info('Matched Files: {files}', ['files' => $matchedFiles]);

        foreach ($matchedFiles as $key => $filePath) {
            if (!$fileSystem->getVisibility($filePath) === 'public') {
                continue;
            }

            try {
                $fileContent = $fileSystem->get($filePath);
    
                Log::info('File content: {content}', ['content' => $fileContent]);
    
                if ($fileContent) {
                    ReportService::processReport($fileContent);
                    // $data = ['content' => $fileContent];
                    // ProcessRabbitMQMessage::dispatch($data);
                }
            } catch(Exception $exception) {
                Log::error('Error processing file: {file}', ['file' => $filePath, 'exception' => $exception->getMessage()]);
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
