<?php

namespace App\Http\Controllers;

use App\Models\TrainingExercise;
use App\Http\Requests\StoreTrainingExerciseRequest;
use App\Http\Requests\UpdateTrainingExerciseRequest;
use Illuminate\Http\Request;

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
    public function update(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request, [
            'weight' => 'required|numeric|min:0', // Ensure positive weight
        ]);

        // Find the exercise
        $exercise = TrainingExercise::findOrFail($id);

        // Update the weight
        $exercise->weight = $request->weight;

        // Save the changes
        $exercise->save();

        // Return a successful response with the updated data
        return response()->json([
            'message' => 'Exercise weight updated successfully!',
            'data' => $exercise,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingExercise $trainingExercise)
    {
        //
    }
}
