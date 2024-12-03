<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filteredStation = $request->input('station');
        $filteredStatus = $request->input('status');
        $filteredDate = $request->input('date');
        
        $queryBuilder = Station::select([
            'stations.title', 
            'stations.code',
            'stations.status',
            'stations.kind_of',
            'data_collections.id',
            'data_collections.created_at',
            'data_collections.collected_at',
            'data_collections.station_id',
            'data_collections.rain',
            'data_collections.level',
            ])
            ->leftJoin('data_collections', 'data_collections.station_id', '=', 'stations.id');

        if (isset($filteredStation) && !is_null($filteredStation)) {
            $queryBuilder->when($filteredStation, function ($query, $filteredStation) {
                return $query->where('stations.code', $filteredStation);
            });
        }

        if (isset($filteredDate) && !is_null($filteredDate)) {
            $queryBuilder->when($filteredDate, function ($query, $filteredDate) {
                return $query->whereDate('data_collections.collected_at', $filteredDate);
            });
        }

        $queryBuilder->orderBy('stations.title', 'asc');
        $queryBuilder->groupBy('stations.code');
        
        $stations = $queryBuilder->get();

        return view('station.index', [
            'stations' => $stations,
            'filteredStation' => $filteredStation,
            'filteredStatus' => $filteredStatus,
            'filteredDate' => $filteredDate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStationRequest $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {
        //
    }
}
