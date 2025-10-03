<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebtorsMasterRequest;
use App\Repositories\All\DebtorsMaster\DebtorsMasterInterface;

class DebtorsMasterController extends Controller
{
    private DebtorsMasterInterface $debtorRepo;

    public function __construct(DebtorsMasterInterface $debtorRepo)
    {
        $this->debtorRepo = $debtorRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->debtorRepo->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DebtorsMasterRequest $request)
    {
        $debtor = $this->debtorRepo->create($request->validated());
        return response()->json($debtor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $debtor = $this->debtorRepo->find($id);
        if (!$debtor) {
            return response()->json(['message' => 'Debtor not found'], 404);
        }
        return response()->json($debtor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DebtorsMasterRequest $request, string $id)
    {
        $updated = $this->debtorRepo->update($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Debtor not found'], 404);
        }
        return response()->json($this->debtorRepo->find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->debtorRepo->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Debtor not found'], 404);
        }
        return response()->json(['message' => 'Debtor deleted']);
    }
}
