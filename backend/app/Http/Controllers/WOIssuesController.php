<?php

namespace App\Http\Controllers;

use App\Http\Requests\WOIssuesRequest;
use App\Repositories\All\WOIssues\WOIssuesInterface;

class WOIssuesController extends Controller
{
    private WOIssuesInterface $repo;

    public function __construct(WOIssuesInterface $repo)
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
    public function store(WOIssuesRequest $request)
    {
        $record = $this->repo->create($request->validated());
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->repo->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WOIssuesRequest $request, string $id)
    {
        $this->repo->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repo->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
