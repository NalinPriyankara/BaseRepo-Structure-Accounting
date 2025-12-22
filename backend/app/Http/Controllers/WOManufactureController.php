<?php

namespace App\Http\Controllers;

use App\Http\Requests\WOManufactureRequest;
use App\Repositories\All\WOManufacture\WOManufactureInterface;

class WOManufactureController extends Controller
{
    private WOManufactureInterface $repo;

    public function __construct(WOManufactureInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->repo->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WOManufactureRequest $request)
    {
        $record = $this->repo->create($request->validated());
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->repo->find($id);

        if (! $record) {
            return response()->json(['message' => 'Manufacture record not found'], 404);
        }

        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WOManufactureRequest $request, string $id)
    {
        $updated = $this->repo->update($id, $request->validated());

        if (! $updated) {
            return response()->json(['message' => 'Update failed'], 404);
        }

        return response()->json(['message' => 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->repo->delete($id);

        if (! $deleted) {
            return response()->json(['message' => 'Delete failed'], 404);
        }

        return response()->json(['message' => 'Deleted successfully']);
    }
}
