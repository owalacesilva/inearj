<?php

namespace App\Services;

use App\Interfaces\Entities\StationEntity;
use App\Interfaces\Entities\DataCollectionEntity;
use App\Repositories\ReportRepository;
use App\Repositories\EloquentStationRepository;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Support\Facades\Log;
use ParseError;

class ReportService
{
    /**
     * Process the report data.
     * 
     * @example $data 2141090,2024-11-01,03:30:06,  310,  23.0, 26.1, 22.9, 12.8
     * @param string $data The report data in the format 'd/m/Y H:i amount'
     */
    public static function processReport($data)
    {
        try {
            // Log the initial data received for processing
            Log::info('Starting to process data: {data}', ['data' => $data]);

            // Split the data string into date, time, and amount components
            list($stationCode, $dateString, $timeString, $rain, $level) = explode(',', $data);
            Log::debug('Parsed data - Date: ' . $dateString . ', Time: ' . $timeString . ', Rain: ' . $rain . ', Level: ' . $level);

            // Convert the date string to a Carbon date object
            $date = Carbon::createFromFormat('Y-m-d', $dateString);

            // Convert the time string to a Carbon time object
            $time = Carbon::createFromFormat('H:i:s', $timeString);

            // Replace comma with dot in the amount string and validate it
            if (!is_numeric($rain)) {
                throw new ParseError('Invalid amount format');
            }

            // Replace comma with dot in the amount string and validate it
            if (!is_numeric($level)) {
                throw new ParseError('Invalid amount format');
            }

            $stationsRepository = new EloquentStationRepository();
            $station = $stationsRepository->getStationByCode($stationCode);
            Log::debug('Station found: ' . $station);

            if (is_null($station)) {
                throw new RecordNotFoundException('Station with code ' . $stationCode . ' not found');
            }

            $stationEntity = new StationEntity(
                $station->id,
                $station->created_at,
                $station->updated_at,
                $station->title,
                $station->code
            );
            $dataCollectionEntity = new DataCollectionEntity(null, null, null, $stationEntity, $date, $rain, $level);

            $repository = new ReportRepository();
            $dataCollection = $repository->createReport($dataCollectionEntity);

            Log::info('Data collection created: ID {id}', ['id' => $dataCollection->id]);
        } catch (ParseError | InvalidFormatException $e) {
            // Log any errors encountered during processing
            Log::error('===========================================');
            Log::error('Error processing data: ', ['message' => $e]);
            Log::error('===========================================');
        }
    }
}