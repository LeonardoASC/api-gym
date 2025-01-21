<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use App\Http\Requests\StoreNutritionRequest;
use App\Http\Requests\UpdateNutritionRequest;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        \Log::info('Token recebido no backend:', ['Authorization' => request()->header('Authorization')]);
    
        $user = auth()->user();
        if (!$user) {
            \Log::error('Usuário não autenticado.', ['token' => request()->header('Authorization')]);
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        \Log::info('Usuário autenticado:', ['id' => $user->id, 'name' => $user->name]);
    
        return Nutrition::where('user_id', $user->id)->get();
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
    public function store(StoreNutritionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nutrition $nutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nutrition $nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNutritionRequest $request, Nutrition $nutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nutrition $nutrition)
    {
        //
    }
}
