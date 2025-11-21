<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebtorTransRequest;
use App\Repositories\All\DebtorTrans\DebtorTransInterface;

class DebtorTransController extends Controller
{
    protected DebtorTransInterface $repo;

    public function __construct(DebtorTransInterface $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->repo->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DebtorTransRequest $request)
    {
        $record = $this->repo->create($request->validated());
        return response()->json($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->repo->find($id);
        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DebtorTransRequest $request, string $id)
    {
        $this->repo->update($id, $request->validated());
        return response()->json(['message' => 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repo->delete($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
