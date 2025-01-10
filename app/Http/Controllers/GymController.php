<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Http\Requests\StoreGymRequest;
use App\Http\Requests\UpdateGymRequest;

class GymController extends Controller
{

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

    public function updateGymRegister(UpdateGymRequest $request, $id)
    {
        $gym = Gym::findOrFail($id);
        $gym->update($request->validated());

        $gym->update(['is_complete' => true]);

        return response()->json([
            'message' => 'Ginásio atualizado com sucesso',
            'is_complete' => true,
        ]);
    }


}
