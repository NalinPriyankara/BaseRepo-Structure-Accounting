<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiscalYearRequest;
use App\Repositories\All\FiscalYear\FiscalYearInterface;

class FiscalYearController extends Controller
{
    private FiscalYearInterface $fiscalYearRepo;

    public function __construct(FiscalYearInterface $fiscalYearRepo)
    {
        $this->fiscalYearRepo = $fiscalYearRepo;
    }

    public function index()
    {
        return response()->json($this->fiscalYearRepo->all());
    }

    public function store(FiscalYearRequest $request)
    {
        $fiscalYear = $this->fiscalYearRepo->create($request->validated());
        return response()->json($fiscalYear, 201);
    }

    public function show(string $id)
    {
        $fiscalYear = $this->fiscalYearRepo->find($id);
        if (!$fiscalYear) {
            return response()->json(['message' => 'Fiscal year not found'], 404);
        }
        return response()->json($fiscalYear);
    }

    public function update(FiscalYearRequest $request, string $id)
    {
        $fiscalYear = $this->fiscalYearRepo->find($id);
        if (!$fiscalYear) {
            return response()->json(['message' => 'Fiscal year not found'], 404);
        }

        $fiscalYear = $this->fiscalYearRepo->update($id, $request->validated());
        return response()->json($fiscalYear);
    }

    public function destroy(string $id)
    {
        $fiscalYear = $this->fiscalYearRepo->find($id);
        if (!$fiscalYear) {
            return response()->json(['message' => 'Fiscal year not found'], 404);
        }

        $this->fiscalYearRepo->delete($id);
        return response()->json(['message' => 'Fiscal year deleted']);
    }
}
