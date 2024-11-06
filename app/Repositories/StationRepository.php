<?php

namespace App\Repositories;

use App\Interfaces\Repositories\StationRepositoryInterface;
use App\Models\Station;

/**
 * Class StationRepository
 * @package App\Repositories
 */
class StationRepository implements StationRepositoryInterface
{
    public function getStationByCode(string $code): Station | null
    {
        return Station::firstWhere('code', $code);
    }
}