<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockMovesRequest;
use App\Repositories\All\StockMoves\StockMovesInterface;
use Illuminate\Http\JsonResponse;

class StockMovesController extends Controller
{
    private StockMovesInterface $stockMovesRepo;

    public function __construct(StockMovesInterface $stockMovesRepo)
    {
        $this->stockMovesRepo = $stockMovesRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->stockMovesRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockMovesRequest $request): JsonResponse
    {
        $record = $this->stockMovesRepo->create($request->validated());
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $record = $this->stockMovesRepo->find($id);
        if (! $record) {
            return response()->json(['message' => 'Stock Move not found'], 404);
        }
        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockMovesRequest $request, string $id): JsonResponse
    {
        $updated = $this->stockMovesRepo->update($id, $request->validated());
        if (! $updated) {
            return response()->json(['message' => 'Update failed or record not found'], 404);
        }
        return response()->json(['message' => 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->stockMovesRepo->delete($id);
        if (! $deleted) {
            return response()->json(['message' => 'Delete failed or record not found'], 404);
        }
        return response()->json(['message' => 'Deleted successfully']);
    }
}
