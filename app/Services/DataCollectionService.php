<?php

namespace App\Services;

use App\Interfaces\Repositories\StationRepositoryInterface;
use Carbon\Carbon;

/**
 * Class DataCollectionService
 * @package App\Services
 */
class DataCollectionService
{
    private StationRepositoryInterface $repository;

    /**
     * DataCollectionService constructor.
     */
    public function __construct(StationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List data collection.
     *
     * @return array The data collection
     */
    public function listDataCollection(): array
    {
        // Get stations by last data collection time, subtracting 510 minutes from the current time
        $dataCollections = $this->repository->getStationsByLastDataCollection(
            Carbon::now()->subMinutes(510)->toDateTime()
        );

        // Format the collected at date
        return array_map(function ($dataCollection) {
            $dataCollection['status'] = 'alert';

            if (!is_null($dataCollection['data_id'])) {
                // Calculate the status
                $dataCollection['status'] = $this->getStatusByCollectedAt($dataCollection['collected_at']);

                // Calculate the multiples of 5 minutes
                $dataCollection['level'] = $this->calculateAdjustedLevel($dataCollection);
                $dataCollection['rain'] = $this->calculateAdjustedRain($dataCollection);
    
                // Format the collected at date
                $dataCollection['collected_at'] = $this->getFormattedCollectedAt($dataCollection['collected_at']);
                $dataCollection['level'] = $this->getFormattedLevel($dataCollection['level']);
            }

            return $dataCollection;
        }, $dataCollections);

        // Return or process $dataCollections as needed
        return $dataCollections;
    }

    /** 
     * Get the formatted collected at date.
     *
     * @param string $collectedAt The collected at date
     * @return string The formatted collected at date
     */
    private function getFormattedCollectedAt(string | null $collectedAt): string
    {
        if (empty($collectedAt)) {
            return '--';
        }

        // Parse the date and format it as 'd/m/Y'
        return Carbon::parse($collectedAt)->format('d/m/Y H:i:s');
    }

    /** 
     * Get the formatted level.
     *
     * @param float $level The level
     * @return string The formatted level
     */
    private function getFormattedLevel(float | null $level): string
    {
        if (empty($level)) {
            return '--';
        }

        // Format the level as a string with two decimal places
        return number_format((float)$level, 2);
    }

    private function getStatusByCollectedAt(string $collectedAt): string
    {
        try {            
            $collectedAt = Carbon::parse($collectedAt);
    
            if ($collectedAt->diffInMinutes(Carbon::now()) > 30) {
                return 'alert';
            } elseif ($collectedAt->diffInMinutes(Carbon::now()) > 10) {
                return 'warning';
            } else {
                return 'up';
            }
        } catch (\Exception $e) {
            return 'alert';
        }
    }

    /**
     * Calculate the adjusted level based on the data collection.
     *
     * @param array $dataCollection The data collection
     * @return float The calculated level
     */
    private function calculateAdjustedLevel(array $dataCollection): float
    {
        $level = $dataCollection['level'];
        $streamflowSlope = $dataCollection['streamflow_slope'];

        if (is_numeric($level) && is_numeric($streamflowSlope)) {
            return (float)$level * (float)$streamflowSlope;
        }

        return 0.0;
    }

    /**
     * Calculate the adjusted rain based on the data collection.
     *
     * @param array $dataCollection The data collection
     * @return float The calculated rain
     */
    private function calculateAdjustedRain(array $dataCollection): float
    {
        $rain = $dataCollection['rain'];
        $rainGaugeSlope = $dataCollection['rain_gauge_slope'];

        if (is_numeric($rain) && is_numeric($rainGaugeSlope)) {
            return (float)$rain * (float)$rainGaugeSlope;
        }

        return 0.0;
    }
}