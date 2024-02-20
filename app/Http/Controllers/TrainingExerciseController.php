<?php

namespace App\Http\Controllers;

use App\Models\TrainingExercise;
use App\Http\Requests\StoreTrainingExerciseRequest;
use App\Http\Requests\UpdateTrainingExerciseRequest;

class TrainingExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TrainingExercise::with('training')->get();
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
    public function store(StoreTrainingExerciseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingExercise $trainingExercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingExercise $trainingExercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingExerciseRequest $request, TrainingExercise $trainingExercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingExercise $trainingExercise)
    {
        //
    }
}
