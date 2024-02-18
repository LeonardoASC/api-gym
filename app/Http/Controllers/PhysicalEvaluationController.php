<?php

namespace App\Http\Controllers;

use App\Models\PhysicalEvaluation;
use App\Http\Requests\StorePhysicalEvaluationRequest;
use App\Http\Requests\UpdatePhysicalEvaluationRequest;

class PhysicalEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PhysicalEvaluation::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhysicalEvaluationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PhysicalEvaluation $physicalEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhysicalEvaluation $physicalEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhysicalEvaluationRequest $request, PhysicalEvaluation $physicalEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhysicalEvaluation $physicalEvaluation)
    {
        //
    }
}
