<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Payment::with('user')->get();
        // return Training::with('trainingExercises')->get();
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
    public function store(StorePaymentRequest $request)
    {
        // Validação dos dados do pagamento
        $validatedData = $request->validated();

        // Criação de um novo pagamento
        $payment = new Payment();
        $payment->user_id = $validatedData['user_id'];
        $payment->value = $validatedData['value'];
        $payment->status = $validatedData['status'];
        $payment->plan = $validatedData['plan'];
        $payment->payday = $validatedData['payday'];
        $payment->save();

        // Retorna uma resposta JSON indicando o sucesso e os dados do pagamento
        return response()->json([
            'success' => true,
            'message' => 'Payment created successfully!',
            'payment' => $payment
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
