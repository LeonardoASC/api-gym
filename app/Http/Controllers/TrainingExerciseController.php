<?php

namespace App\Http\Controllers;

use App\Models\TrainingExercise;
use App\Models\Training;
use App\Http\Requests\StoreTrainingExerciseRequest;
use App\Http\Requests\UpdateTrainingExerciseRequest;
use Illuminate\Support\Facades\Storage;
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
    // public function store(StoreTrainingExerciseRequest $request)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     $data = $request->validated();
    //     $training = Training::findOrFail($data['training_id']);
    //     $exercisesData = [];
    //     foreach ($data['exercises'] as $exercise) {
    //         // Se há imagem, subir para storage
    //         if (!empty($exercise['image']) && $exercise['image'] instanceof \Illuminate\Http\UploadedFile) {
    //             $exercise['image'] = $exercise['image']->store('training_exercises', 'public');
    //         }
    //         $exercise['training_id'] = $training->id;
    //         $exercisesData[] = $exercise;
    //     }
    //     $training->trainingExercises()->createMany($exercisesData);
    //     $training->load('trainingExercises');
    //     return response()->json([
    //         'message' => 'Exercises created successfully!',
    //         'data' => $training,
    //     ], 201);

    // }
    public function store(StoreTrainingExerciseRequest $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = $request->validated();

        $training = Training::findOrFail($data['training_id']);
        $exercisesData = [];
        foreach ($data['exercises'] as $exercise) {
            if (!empty($exercise['image']) && $exercise['image'] instanceof \Illuminate\Http\UploadedFile) {
                $exercise['image'] = $exercise['image']->store('training_exercises', 'public');
            }
            $exercise['training_id'] = $training->id;
            $exercisesData[] = $exercise;
        }

        $createdExercises = $training->trainingExercises()->createMany($exercisesData);

        return response()->json([
            'message' => 'Exercises created successfully!',
            'data'    => $createdExercises,
        ], 201);
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
    // public function update(Request $request, $id)
    // {
    //     // Validate the request data
    //     $this->validate($request, [
    //         'weight' => 'required|numeric|min:0', // Ensure positive weight
    //     ]);

    //     // Find the exercise
    //     $exercise = TrainingExercise::findOrFail($id);

    //     // Update the weight
    //     $exercise->weight = $request->weight;

    //     // Save the changes
    //     $exercise->save();

    //     // Return a successful response with the updated data
    //     return response()->json([
    //         'message' => 'Exercise weight updated successfully!',
    //         'data' => $exercise,
    //     ], 200);
    // }

    public function update(UpdateTrainingExerciseRequest $request, TrainingExercise $trainingExercise)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($trainingExercise->training->user_id !== $user->id) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->validated();

        //removendo a imagem existente
        if ($request->has('removeImage')) {
            if ($trainingExercise->image) {
                Storage::disk('public')->delete($trainingExercise->image);
            }
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($trainingExercise->image) {
                Storage::disk('public')->delete($trainingExercise->image);
            }
            $data['image'] = $request->file('image')->store('trainingExercises', 'public');
        }

        $trainingExercise->update($data);

        return response()->json($trainingExercise, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingExercise $trainingExercise)
    {
        //
    }
}
