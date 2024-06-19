<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Common\Models\Bank;
use Aaran\Common\Models\Receipttype;
use Aaran\Entries\Models\Payment;
use Aaran\Master\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        $contact=Contact::pluck('id');
        $receiptType=Receipttype::pluck('id');
        $bank=Bank::pluck('id');
        return [
            'company_id' => 1,
            'acyear' => 8,
            'vdate' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'contact_id' => $contact->random(),
            'receipttype_id' => $receiptType->random(),
            'chq_no'=>$this->faker->randomNumber(),
            'chq_date' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'bank_id'=> $bank->random(),
            'payment_amount'=>$this->faker->numberBetween(1,50000),
            'active_id' => 1,
        ];
    }
}
