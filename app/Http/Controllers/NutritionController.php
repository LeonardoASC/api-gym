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

        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

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
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('nutritions', 'public');
        }
        // faça o resto do codigo
        $data['user_id'] = $user->id;
        $nutrition = Nutrition::create($data);


        return response()->json($nutrition, 201);
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
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $nutrition = Nutrition::find($id);
        if (!$nutrition || $nutrition->user_id != $user->id) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $nutrition->update($request->all());

        return response()->json($nutrition);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nutrition $nutrition)
    {
        //
    }
}
