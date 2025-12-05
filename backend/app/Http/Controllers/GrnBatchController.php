<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrnBatchRequest;
use App\Repositories\All\GrnBatch\GrnBatchInterface;

class GrnBatchController extends Controller
{
    private GrnBatchInterface $grnBatch;

    public function __construct(GrnBatchInterface $grnBatch)
    {
        $this->grnBatch = $grnBatch;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->grnBatch->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrnBatchRequest $request)
    {
        $data = $this->grnBatch->create($request->validated());
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->grnBatch->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrnBatchRequest $request, string $id)
    {
        $this->grnBatch->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->grnBatch->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
