<?php

namespace App\Repositories;

use DateTime;
use App\Interfaces\Repositories\StationRepositoryInterface;
use App\Models\Station;

/**
 * Class StationRepository
 * @package App\Repositories
 */
class EloquentStationRepository implements StationRepositoryInterface
{
    public function getStationByCode(string $code): Station | null
    {
        return Station::firstWhere('code', $code);
    }
    
    public function getStationsByLastDataCollection(DateTime $dateTime): array
    {
        return Station::select([
            'stations.title', 
            'stations.code',
            'stations.status',
            'data_collections.id',
            'data_collections.created_at',
            'data_collections.rain',
            'data_collections.collected_at',
            'data_collections.level',
            ])
            ->leftJoin('data_collections', 'data_collections.station_id', '=', 'stations.id')
            ->groupBy('stations.id')
            ->orderBy('data_collections.collected_at', 'desc')
            ->get()
            ->toArray();
    }
}