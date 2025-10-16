<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierContactRequest;
use App\Repositories\All\SupplierContact\SupplierContactInterface;

class SupplierContactController extends Controller
{
    private SupplierContactInterface $supplierContactRepo;

    public function __construct(SupplierContactInterface $supplierContactRepo)
    {
        $this->supplierContactRepo = $supplierContactRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->supplierContactRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierContactRequest $request)
    {
        $contact = $this->supplierContactRepo->create($request->validated());
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = $this->supplierContactRepo->find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierContactRequest $request, string $id)
    {
        $updated = $this->supplierContactRepo->update($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        return response()->json($this->supplierContactRepo->find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->supplierContactRepo->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        return response()->json(null, 204);
    }
}
