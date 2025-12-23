<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySetupRequest;
use App\Repositories\All\CompanySetup\CompanySetupInterface;
use Illuminate\Support\Facades\Storage;
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
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('new_company_logo')) {
            $path = $request->file('new_company_logo')->store('company_logos', 'public');
            $data['new_company_logo'] = $path;
        }

        $company = $this->companyRepo->create($data);
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
    // public function update(CompanySetupRequest $request, string $id)
    // {
    //     $data = $request->validated();

    //     // Handle logo upload
    //     if ($request->hasFile('new_company_logo')) {
    //         $path = $request->file('new_company_logo')->store('company_logos', 'public');
    //         $data['new_company_logo'] = $path;
    //     }

    //     $updated = $this->companyRepo->update($id, $data);

    //     if (!$updated) {
    //         return response()->json(['message' => 'Record not found'], 404);
    //     }

    //     return response()->json(['message' => 'Updated successfully'], 200);
    // }
public function update(CompanySetupRequest $request, string $id)
{
    // First: Find the existing company
    $company = $this->companyRepo->find($id);

    if (!$company) {
        return response()->json(['message' => 'Record not found'], 404);
    }

    $data = $request->validated();

    // Handle logo deletion
    if ($request->boolean('delete_company_logo')) {
        if ($company->new_company_logo && Storage::disk('public')->exists($company->new_company_logo)) {
            Storage::disk('public')->delete($company->new_company_logo);
        }
        $data['new_company_logo'] = null;
        $data['delete_company_logo'] = false; // optional: reset the flag
    }

    // Handle new logo upload (and delete old one if exists)
    if ($request->hasFile('new_company_logo')) {
        // Delete old logo if exists
        if ($company->new_company_logo && Storage::disk('public')->exists($company->new_company_logo)) {
            Storage::disk('public')->delete($company->new_company_logo);
        }

        $path = $request->file('new_company_logo')->store('company_logos', 'public');
        $data['new_company_logo'] = $path;
    }

    // Now update
    $updated = $this->companyRepo->update($id, $data);

    if (!$updated) {
        return response()->json(['message' => 'Update failed'], 500);
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
