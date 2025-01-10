<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    public function getUserByEmail($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function getGymIsComplete($id)
    {
        $user = User::findOrFail($id);
        $gym = $user->gyms()->first();

        if (!$gym) {
            return response()->json([
                'message' => 'Nenhum ginásio associado a este usuário.',
                'is_complete' => null,
            ], 404);
        }
        return response()->json([
            'message' => 'Status do ginásio recuperado com sucesso.',
            'is_complete' => $gym->is_complete,
        ]);
    }


}
