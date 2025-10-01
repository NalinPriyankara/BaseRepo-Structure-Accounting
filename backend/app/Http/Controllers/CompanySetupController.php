<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySetupRequest;
use App\Repositories\All\CompanySetup\CompanySetupInterface;

class CompanySetupController extends Controller
{
    private CompanySetupInterface $companyRepo;

    public function __construct(CompanySetupInterface $companyRepo)
    {
        $this->companyRepo = $companyRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->companyRepo->allWithRelations(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanySetupRequest $request)
    {
        $company = $this->companyRepo->create($request->validated());
        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = $this->companyRepo->find($id);

        if (!$company) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($company, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanySetupRequest $request, string $id)
    {
        $updated = $this->companyRepo->update($id, $request->validated());

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
        $deleted = $this->companyRepo->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
