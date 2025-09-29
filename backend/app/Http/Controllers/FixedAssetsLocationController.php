<?php

namespace App\Http\Controllers;

use App\Http\Requests\FixedAssetsLocationRequest;
use App\Repositories\All\FixedAssetsLocation\FixedAssetsLocationInterface;

class FixedAssetsLocationController extends Controller
{
    private FixedAssetsLocationInterface $locationRepo;

    public function __construct(FixedAssetsLocationInterface $locationRepo)
    {
        $this->locationRepo = $locationRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->locationRepo->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FixedAssetsLocationRequest $request)
    {
        $location = $this->locationRepo->create($request->validated());
        return response()->json($location, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = $this->locationRepo->find($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json($location, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FixedAssetsLocationRequest $request, string $id)
    {
        $updated = $this->locationRepo->update($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json(['message' => 'Location updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->locationRepo->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json(['message' => 'Location deleted successfully'], 200);
    }
}
