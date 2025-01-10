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

    public function getUsersWithGym()
    {
        //retorna o usuario e as academias associadas 
        $users = User::with('gym')->get();
        return response()->json($users);
    }

}
