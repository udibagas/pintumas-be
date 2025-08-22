<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplyChainRequest;
use App\Http\Requests\UpdateSupplyChainRequest;
use App\Models\SupplyChain;

class SupplyChainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(SupplyChain::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplyChainRequest $request)
    {
        return response()->json(SupplyChain::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplyChain $supplyChain)
    {
        return response()->json($supplyChain);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplyChainRequest $request, SupplyChain $supplyChain)
    {
        $supplyChain->update($request->validated());
        return response()->json($supplyChain);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplyChain $supplyChain)
    {
        $supplyChain->delete();
        return response()->json(null, 204);
    }
}
