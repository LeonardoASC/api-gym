<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;



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
    // public function store(StoreTrainingRequest $request)
    // {
    //     $user = auth()->user();

    //     if (!$user) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     $data = $request->validated();
    //     if ($request->hasFile('image')) {
    //         $path = $request->file('image')->store('trainings', 'public');
    //         $data['image'] = $path;
    //     }

    //     $data['user_id'] = $user->id;
    //     $training = Training::create($data);

    //     return response()->json([
    //         'message' => 'Treino criado com sucesso!',
    //         'data' => $training
    //     ], 201);
    // }

    public function store(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('trainings', 'public');
            $data['image'] = $path;
        }

        $data['user_id'] = $user->id;

        $training = Training::create($data);

        if (!empty($data['training_exercises'])) {
            $exercisesData = [];
            foreach ($data['training_exercises'] as $exercise) {
                if (isset($exercise['image']) && $exercise['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $exerciseImagePath = $exercise['image']->store('training_exercises', 'public');
                    $exercise['image'] = $exerciseImagePath;
                }
                $exercise['training_id'] = $training->id;
                $exercisesData[] = $exercise;
            }
            $training->trainingExercises()->createMany($exercisesData);
        }

        return response()->json([
            'message' => 'Treino criado com sucesso!',
            'data'    => $training->load('trainingExercises')
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
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Verifica se o usuário é dono do recurso
        if ($training->user_id !== $user->id) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->validated();

        //removendo a imagem existente
        if ($request->has('removeImage')) {
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        $training->update($data);

        return response()->json($training, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        if(!$training){
            return response()->json([
                'message' => 'Treino não encontrado!'
            ], 404);
        }

        $training->delete();

        return response()->json([
            'message' => 'Treino excluído com sucesso!'
        ], 200);
    }
}
