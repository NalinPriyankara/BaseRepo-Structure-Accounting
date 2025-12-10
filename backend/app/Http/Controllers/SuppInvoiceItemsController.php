<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppInvoiceItemsRequest;
use App\Repositories\All\SuppInvoiceItems\SuppInvoiceItemsInterface;

class SuppInvoiceItemsController extends Controller
{
    private SuppInvoiceItemsInterface $suppInvoiceItems;

    public function __construct(SuppInvoiceItemsInterface $suppInvoiceItems)
    {
        $this->suppInvoiceItems = $suppInvoiceItems;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->suppInvoiceItems->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuppInvoiceItemsRequest $request)
    {
        $item = $this->suppInvoiceItems->create($request->validated());
        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->suppInvoiceItems->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuppInvoiceItemsRequest $request, string $id)
    {
         $this->suppInvoiceItems->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->suppInvoiceItems->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
