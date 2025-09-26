<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Repositories\All\Supplier\SupplierInterface;

class SupplierController extends Controller
{
    private SupplierInterface $supplierRepo;

    public function __construct(SupplierInterface $supplierRepo)
    {
        $this->supplierRepo = $supplierRepo;
    }

    public function index()
    {
        return response()->json($this->supplierRepo->all());
    }

    public function store(SupplierRequest $request)
    {
        $supplier = $this->supplierRepo->create($request->validated());
        return response()->json($supplier, 201);
    }

    public function show($id)
    {
        $supplier = $this->supplierRepo->find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json($supplier);
    }

    public function update(SupplierRequest $request, $id)
    {
        $supplier = $this->supplierRepo->update($id, $request->validated());

        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json($supplier);
    }

    public function destroy($id)
    {
        $deleted = $this->supplierRepo->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        return response()->json(['message' => 'Supplier deleted']);
    }
}
