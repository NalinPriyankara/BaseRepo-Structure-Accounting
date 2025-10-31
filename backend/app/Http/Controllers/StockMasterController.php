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
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('stock_images', 'public');
            $data['image'] = $path;
        }

        $stockMaster = $this->stockMasterRepo->create($data);

        return response()->json($stockMaster, 201);
    }

    public function show(string $id)
    {
        $stockMaster = $this->stockMasterRepo->find($id);
        if (!$stockMaster) {
            return response()->json(['message' => 'Stock Master not found'], 404);
        }
        return response()->json($stockMaster);
    }

    public function update(StockMasterRequest $request, string $id)
    {
        $updated = $this->stockMasterRepo->update($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Stock Master not found'], 404);
        }
        return response()->json($this->stockMasterRepo->find($id));
    }

    public function destroy(string $id)
    {
        $deleted = $this->stockMasterRepo->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Stock Master not found'], 404);
        }
        return response()->json(['message' => 'Deleted successfully']);
    }
}
