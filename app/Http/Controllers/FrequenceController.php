<?php

namespace App\Http\Controllers;

use App\Models\Frequence;
use App\Http\Requests\StoreFrequenceRequest;
use App\Http\Requests\UpdateFrequenceRequest;
use Illuminate\Http\Request;

class FrequenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Frequence::all();        
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
    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'present' => 'required|boolean',
            'entry_time' => 'nullable|date_format:H:i',
        ]);

        try {
            // Cria uma nova instância de Frequence
            $frequence = new Frequence();
            
            // Atribui os valores vindos do request
            $frequence->user_id = $validatedData['user_id'];
            $frequence->date = $validatedData['date'];
            $frequence->present = $validatedData['present'];
            $frequence->entry_time = $validatedData['entry_time'];

            // Salva a instância no banco de dados
            $frequence->save();

            // Retorna uma resposta de sucesso com os dados salvos
            return response()->json(['message' => 'Frequência registrada com sucesso', 'data' => $frequence], 201);
        } catch (\Exception $e) {
            // Em caso de erro, retorna uma resposta com o erro
            return response()->json(['message' => 'Erro ao registrar a frequência', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Frequence $frequence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frequence $frequence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrequenceRequest $request, Frequence $frequence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frequence $frequence)
    {
        //
    }
}
