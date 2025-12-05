<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchOrdersRequest;
use App\Repositories\All\PurchOrders\PurchOrdersInterface;
use Illuminate\Http\Request;

class PurchOrdersController extends Controller
{
    private PurchOrdersInterface $purchOrders;

    public function __construct(PurchOrdersInterface $purchOrders)
    {
        $this->purchOrders = $purchOrders;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->purchOrders->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchOrdersRequest $request)
    {
        $purchOrder = $this->purchOrders->create($request->validated());
        return response()->json($purchOrder, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->purchOrders->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchOrdersRequest $request, string $id)
    {
        $this->purchOrders->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->purchOrders->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
