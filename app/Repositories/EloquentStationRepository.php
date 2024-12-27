<?php

namespace App\Repositories;

use DateTime;
use Illuminate\Support\Facades\DB;
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
    
    private function getStationsByLastDataCollectionV1(DateTime $dateTime): array
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
    
    private function getStationsByLastDataCollectionV2(DateTime $dateTime): array
    {
        $subquery = DB::table('data_collections as dc1')
            ->select('dc1.id', 'dc1.station_id', 'dc1.created_at', 'dc1.collected_at', 'dc1.rain', 'dc1.level')
            ->join(DB::raw('(SELECT station_id, MAX(id) as max_id FROM data_collections GROUP BY station_id) as dc2'), function ($join) {
                $join->on('dc1.station_id', '=', 'dc2.station_id')
                    ->on('dc1.id', '=', 'dc2.max_id');
            });

        $results = DB::table('stations')
            ->leftJoinSub($subquery, 'latest_data', function ($join) {
                $join->on('stations.id', '=', 'latest_data.station_id');
            })
            ->select('stations.id', 'stations.code', 'stations.title', 'stations.streamflow_slope', 'stations.rain_gauge_slope', 'latest_data.id as data_id', 'latest_data.created_at', 'latest_data.collected_at', 'latest_data.rain', 'latest_data.level')
            ->orderBy('latest_data.created_at', 'desc')
            ->get();

        $stations = [];
        foreach ($results as $row) {
            $stations[] = [
                'id' => $row->id,
                'code' => $row->code,
                'title' => $row->title,
                'data_id' => $row->data_id,
                'created_at' => $row->created_at,
                'collected_at' => $row->collected_at,
                'streamflow_slope' => $row->streamflow_slope,
                'rain_gauge_slope' => $row->rain_gauge_slope,
                'rain' => $row->rain,
                'level' => $row->level,
            ];
        }

        return $stations;
    }
    
    public function getStationsByLastDataCollection(DateTime $dateTime): array
    {
        return $this->getStationsByLastDataCollectionV2($dateTime);
    }
}