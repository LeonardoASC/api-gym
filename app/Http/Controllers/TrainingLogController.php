<?php

namespace App\Http\Controllers;

use App\Models\TrainingLog;
use App\Http\Requests\StoreTrainingLogRequest;
use App\Http\Requests\UpdateTrainingLogRequest;

class TrainingLogController extends Controller
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
            return TrainingLog::all();
        }
        return TrainingLog::where('user_id', $user->id)->get();
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
    public function store(StoreTrainingLogRequest $request)
    {
        // Validate the request data
        $validated = $request->validated();

        // Create a new TrainingLog instance with the validated data
        $trainingLog = TrainingLog::create($validated);

        // Return a response indicating success
        return response()->json([
            'message' => 'Training log created successfully',
            'data' => $trainingLog
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingLog $trainingLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingLog $trainingLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingLogRequest $request, TrainingLog $trainingLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingLog $trainingLog)
    {
        //
    }
}
