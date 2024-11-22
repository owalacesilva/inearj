<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataCollectionRequest;
use App\Http\Requests\UpdateDataCollectionRequest;
use App\Models\DataCollection;
use App\Models\Station;

class DataCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination = DataCollection::select([
            'data_collections.id',
            'data_collections.created_at',
            'data_collections.collected_at',
            'data_collections.station_id',
            'data_collections.rain',
            'data_collections.level',
            'stations.title', 
            'stations.code',
            'stations.status',
            ])
            ->join('stations', 'stations.id', '=', 'data_collections.station_id')
            ->orderBy('data_collections.created_at', 'desc')
            ->paginate(100)
            ->toArray();

        return view('data-collections.index', [
            'stations' => Station::select(['id', 'title', 'code'])->get(),
            'pagination' => $pagination,
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
    public function store(StoreDataCollectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataCollection $dataCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataCollection $dataCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataCollectionRequest $request, DataCollection $dataCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataCollection $dataCollection)
    {
        //
    }
}
