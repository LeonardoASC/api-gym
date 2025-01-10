<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Http\Requests\StoreGymRequest;
use App\Http\Requests\UpdateGymRequest;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreGymRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGymRequest $request, Gym $gym)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gym $gym)
    {
        //
    }

    public function getGymByEmail($email)
    {
        // Supondo que há uma relação entre Gym e User
        $gym = Gym::whereHas('user', function ($query) use ($email) {
            $query->where('email', $email);
        })->first();
    
        if (!$gym) {
            return response()->json(['message' => 'Gym not found'], 404);
        }
    
        return response()->json($gym);
    }
    
}
