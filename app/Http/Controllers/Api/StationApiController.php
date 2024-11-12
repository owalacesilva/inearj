<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\Station;

class StationApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'warning' => 100, 
            'alert' => 100, 
            'maintenance' => 100, 
            'updated' => 100, 
            'total' => 100, 
            'data' => Station::select(['id', 'title', 'status'])->get()
        ]);
    }
}
