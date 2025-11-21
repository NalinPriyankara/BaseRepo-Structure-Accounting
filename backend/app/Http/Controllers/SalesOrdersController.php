<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesOrdersRequest;
use App\Repositories\All\SalesOrders\SalesOrdersInterface;

class SalesOrdersController extends Controller
{
    private SalesOrdersInterface $salesOrders;

    public function __construct(SalesOrdersInterface $salesOrders)
    {
        $this->salesOrders = $salesOrders;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->salesOrders->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesOrdersRequest $request)
    {
        $salesOrder = $this->salesOrders->create($request->validated());
        return response()->json($salesOrder, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->salesOrders->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesOrdersRequest $request, string $id)
    {
        $this->salesOrders->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->salesOrders->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
