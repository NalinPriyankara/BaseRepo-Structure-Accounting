<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesPricingRequest;
use App\Repositories\All\SalesPricing\SalesPricingInterface;

class SalesPricingController extends Controller
{
    private SalesPricingInterface $salesPricingRepo;

    public function __construct(SalesPricingInterface $salesPricingRepo)
    {
        $this->salesPricingRepo = $salesPricingRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->salesPricingRepo->allWithRelations(),200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesPricingRequest $request)
    {
        $salesPricing = $this->salesPricingRepo->create($request->validated());
        return response()->json($salesPricing, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salesPricing = $this->salesPricingRepo->find($id);

        if (!$salesPricing) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($salesPricing, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesPricingRequest $request, string $id)
    {
        $updated = $this->salesPricingRepo->update($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json(['message' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->salesPricingRepo->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
