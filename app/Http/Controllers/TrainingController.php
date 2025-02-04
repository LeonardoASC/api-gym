<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if(!$user){
            return response()->json([
                'message' => 'Usuário não autenticado'
            ], 401);
        }
        if ($user->role === 'admin') {
            return Training::with('trainingExercises')->get();
        }
        return Training::where('user_id', $user->id)->with('trainingExercises')->get();

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
    public function store(StoreTrainingRequest $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // $validated = $request->validated();
        // $training = Training::create($validated);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('trainings', 'public');
            // $data['image'] = url("storage/{$path}");
            $data['image'] = $path;
        }
        $data['user_id'] = $user->id;
        $training = Training::create($data);
        return response()->json([
            'message' => 'Treino criado com sucesso!',
            'data' => $training
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
    }
}
