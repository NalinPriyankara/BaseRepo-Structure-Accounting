<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebtorTransDetailsRequest;
use App\Repositories\All\DebtorTransDetails\DebtorTransDetailsInterface;

class DebtorTransDetailsController extends Controller
{
    private DebtorTransDetailsInterface $repo;

    public function __construct(DebtorTransDetailsInterface $repo)
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
    public function store(DebtorTransDetailsRequest $request)
    {
        $created = $this->repo->create($request->validated());
        return response()->json($created, 201);
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
    public function update(DebtorTransDetailsRequest $request, string $id)
    {
        $updated = $this->repo->update($id, $request->validated());
        return response()->json(['success' => $updated]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->repo->delete($id);
        return response()->json(['success' => $deleted]);
    }
}
