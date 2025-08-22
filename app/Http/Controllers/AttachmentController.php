<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Requests\UpdateAttachmentRequest;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Attachment::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttachmentRequest $request)
    {
        return response()->json(Attachment::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attachment $attachment)
    {
        return response()->json($attachment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttachmentRequest $request, Attachment $attachment)
    {
        $attachment->update($request->validated());
        return response()->json($attachment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attachment $attachment)
    {
        $attachment->delete();
        return response()->json(null, 204);
    }
}
