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
            $dataCollection['collected_at'] = $this->getFormattedCollectedAt($dataCollection['collected_at']);
            $dataCollection['level'] = $this->getFormattedLevel($dataCollection['level']);
            $dataCollection['status'] = $this->getStatusByCollectedAt($dataCollection['collected_at']);

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
        return number_format((float)$level, 2) . ' Level';
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
}