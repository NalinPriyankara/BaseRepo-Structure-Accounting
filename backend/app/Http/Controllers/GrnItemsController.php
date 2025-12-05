<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrnItemsRequest;
use App\Repositories\All\GrnItems\GrnItemsInterface;

class GrnItemsController extends Controller
{
    private GrnItemsInterface $grnItems;

    public function __construct(GrnItemsInterface $grnItems)
    {
        $this->grnItems = $grnItems;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->grnItems->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrnItemsRequest $request)
    {
        $data = $this->grnItems->create($request->validated());
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->grnItems->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrnItemsRequest $request, string $id)
    {
        $this->grnItems->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->grnItems->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
