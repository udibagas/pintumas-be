<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegulationRequest;
use App\Http\Requests\UpdateRegulationRequest;
use App\Models\Regulation;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Regulation::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegulationRequest $request)
    {
        return response()->json(Regulation::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulation $regulation)
    {
        return response()->json($regulation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegulationRequest $request, Regulation $regulation)
    {
        $regulation->update($request->validated());
        return response()->json($regulation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regulation $regulation)
    {
        $regulation->delete();
        return response()->json(null, 204);
    }
}
