<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppRequest;
use App\Http\Requests\UpdateAppRequest;
use App\Models\App;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = App::paginate();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppRequest $request)
    {
        return response()->json(App::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(App $app)
    {
        return response()->json($app);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppRequest $request, App $app)
    {
        $app->update($request->validated());
        return response()->json($app);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(App $app)
    {
        $app->delete();
        return response()->json(null, 204);
    }
}
