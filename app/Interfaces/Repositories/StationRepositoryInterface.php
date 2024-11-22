<?php

namespace App\Interfaces\Repositories;

use DateTime;
use App\Models\Station;

/**
 * Interface StationRepositoryInterface
 * @package App\Interfaces\Repositories
 */
interface StationRepositoryInterface
{
    /**
     * Get a station by its code.
     * 
     * @param string $code The station code
     * @return Station The station
     */
    public function getStationByCode(string $code): Station | null;

    /**
     * Get all stations by their last data collection.
     *
     * @return Station[] The stations
     */
    public function getStationsByLastDataCollection(DateTime $dateTime): array;
}