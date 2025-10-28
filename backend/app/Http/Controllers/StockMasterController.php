<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockMasterRequest;
use App\Repositories\All\StockMaster\StockMasterInterface;

class StockMasterController extends Controller
{
    private StockMasterInterface $stockMasterRepo;

    public function __construct(StockMasterInterface $stockMasterRepo)
    {
        $this->stockMasterRepo = $stockMasterRepo;
    }

    public function index()
    {
        return response()->json($this->stockMasterRepo->all());
    }

    public function store(StockMasterRequest $request)
    {
        $stockMaster = $this->stockMasterRepo->create($request->validated());
        return response()->json($stockMaster, 201);
    }

    public function show(int $id)
    {
        $stockMaster = $this->stockMasterRepo->find($id);
        if (!$stockMaster) {
            return response()->json(['message' => 'Stock Master not found'], 404);
        }
        return response()->json($stockMaster);
    }

    public function update(StockMasterRequest $request, int $id)
    {
        $updated = $this->stockMasterRepo->update($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Stock Master not found'], 404);
        }
        return response()->json($this->stockMasterRepo->find($id));
    }

    public function destroy(int $id)
    {
        $deleted = $this->stockMasterRepo->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Stock Master not found'], 404);
        }
        return response()->json(['message' => 'Deleted successfully']);
    }
}
