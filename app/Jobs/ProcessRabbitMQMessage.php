<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Exceptions\ParseErrorException;
use App\Exceptions\FormattingErrorException;

class ProcessRabbitMQMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::debug('Starting to process data: ' . $this->data);

            list($date, $time, $amount) = explode(' ', $this->data);
            Log::debug('Parsed data - Date: ' . $date . ', Time: ' . $time . ', Amount: ' . $amount);

            $date = \DateTime::createFromFormat('d/m/Y', $date);
            if (!$date) {
                throw new ParseErrorException('Invalid date format');
            }
            Log::debug('Formatted date: ' . $date->format('Y-m-d'));

            $amount = str_replace(',', '.', $amount);
            if (!is_numeric($amount)) {
                throw new FormattingErrorException('Invalid amount format');
            }
            Log::debug('Formatted amount: ' . $amount);

            echo "Date: " . $date->format('Y-m-d') . "\n";
            echo "Time: " . $time . "\n";
            echo "Amount: " . $amount . "\n";
        } catch (ParseErrorException | FormattingErrorException $e) {
            Log::error('Error processing data: ' . $e->getMessage());
            echo 'Error: ' . $e->getMessage() . "\n";
        }
    }
}
