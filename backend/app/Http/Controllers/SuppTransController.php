<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuppTransRequest;
use App\Repositories\All\SuppTrans\SuppTransInterface;

class SuppTransController extends Controller
{
    protected SuppTransInterface $repo;

    public function __construct(SuppTransInterface $repo)
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
    public function store(SuppTransRequest $request)
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
    public function update(SuppTransRequest $request, string $id)
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
