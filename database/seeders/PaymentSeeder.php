<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'user_id' => 1,
                'value' => 50.00,
                'status' => 'Paid',
                'plan' => 'Monthly',
                'payday' => Carbon::now()->subDays(5), // Pagamento feito há 5 dias
            ],
            [
                'user_id' => 2,
                'value' => 30.00,
                'status' => 'Paid',
                'plan' => 'Monthly',
                'payday' => Carbon::now()->subDays(1), // Pagamento aberto há 1 dias
            ],
            [
                'user_id' => 2,
                'value' => 40.00,
                'status' => 'Open',
                'plan' => 'Monthly',
                'payday' => Carbon::now()->subDays(31), // Pagamento aberto há 31 dias
            ],
        ];

        // Insere os pagamentos na tabela
        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
