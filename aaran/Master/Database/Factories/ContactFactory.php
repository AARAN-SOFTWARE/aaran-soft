<?php

namespace Aaran\Master\Database\Factories;

use Aaran\Common\Models\City;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name(),
            'mobile' => $this->faker->phoneNumber(),
            'whatsapp' => $this->faker->phoneNumber(),
            'contact_person' => $this->faker->name(),
            'contact_type' => '1',
            'msme_no' => $this->faker->randomNumber(1,10),
            'msme_type'=>  $this->faker->name(),
            'opening_balance' => $this->faker->randomNumber(1,10),
            'effective_from'=> $this->faker->date(),
            'user_id'=>'1',
            'company_id'=>'1',
            'active_id'=> 1,
//            Contact_detail::factory()->count(1)->create()
        ];

    }
}
