<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecurrentInvoiceRequest;
use App\Repositories\All\RecurrentInvoice\RecurrentInvoiceInterface;
use Illuminate\Http\Request;

class RecurrentInvoiceController extends Controller
{
    private RecurrentInvoiceInterface $recurrentInvoice;

    public function __construct(RecurrentInvoiceInterface $recurrentInvoice)
    {
        $this->recurrentInvoice = $recurrentInvoice;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->recurrentInvoice->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecurrentInvoiceRequest $request)
    {
        $recurrentInvoice = $this->recurrentInvoice->create($request->validated());
        return response()->json($recurrentInvoice, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->recurrentInvoice->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecurrentInvoiceRequest $request, string $id)
    {
        $this->recurrentInvoice->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->recurrentInvoice->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
