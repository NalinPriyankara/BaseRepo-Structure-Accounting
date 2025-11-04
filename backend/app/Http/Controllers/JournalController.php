<?php

namespace App\Http\Controllers;

use App\Http\Requests\JournalRequest;
use App\Repositories\All\Journal\JournalInterface;
use Illuminate\Http\JsonResponse;

class JournalController extends Controller
{
    private JournalInterface $journalRepository;

    public function __construct(JournalInterface $journalRepository)
    {
        $this->journalRepository = $journalRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->journalRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JournalRequest $request): JsonResponse
    {
        $journal = $this->journalRepository->create($request->validated());
        return response()->json($journal, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $journal = $this->journalRepository->find($id);
        if (!$journal) {
            return response()->json(['message' => 'Journal entry not found'], 404);
        }
        return response()->json($journal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JournalRequest $request, string $id): JsonResponse
    {
        $updated = $this->journalRepository->update($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Journal entry not found or not updated'], 404);
        }
        return response()->json(['message' => 'Journal entry updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->journalRepository->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Journal entry not found or could not be deleted'], 404);
        }
        return response()->json(['message' => 'Journal entry deleted successfully']);
    }
}
