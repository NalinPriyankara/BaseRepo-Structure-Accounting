<?php

namespace App\Http\Controllers;

use App\Http\Requests\SysPrefsRequest;
use App\Repositories\All\SysPrefs\SysPrefsInterface;

class SysPrefsController extends Controller
{
    private SysPrefsInterface $sysPrefs;
    public function __construct(SysPrefsInterface $sysPrefs)
    {
        $this->sysPrefs = $sysPrefs;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->sysPrefs->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SysPrefsRequest $request)
    {
        $data = $this->sysPrefs->create($request->validated());
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->sysPrefs->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SysPrefsRequest $request, string $id)
    {
        $this->sysPrefs->update($id, $request->validated());
        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->sysPrefs->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
