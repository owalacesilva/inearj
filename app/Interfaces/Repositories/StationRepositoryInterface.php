<?php

namespace App\Interfaces\Repositories;

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
}