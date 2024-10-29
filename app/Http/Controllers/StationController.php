<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;

class StationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('station.index', [
            'stations' => Station::all(),
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
