<?php

namespace App\Http\Controllers;

use App\Http\Requests\WOIssueItemsRequest;
use App\Repositories\All\WOIssueItems\WOIssueItemsInterface;

class WOIssueItemsController extends Controller
{
    private WOIssueItemsInterface $repo;

    public function __construct(WOIssueItemsInterface $repo)
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
    public function store(WOIssueItemsRequest $request)
    {
        $item = $this->repo->create($request->validated());
        return response()->json($item, 201);
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
    public function update(WOIssueItemsRequest $request, string $id)
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
