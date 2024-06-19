<?php

namespace Aaran\Master\Database\Factories;

use Aaran\Common\Models\City;
use Aaran\Common\Models\Country;
use Aaran\Common\Models\Pincode;
use Aaran\Common\Models\State;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\Contact_detail;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContactDetailFactory extends Factory
{
    protected $model = Contact_detail::class;

    public function definition(): array
    {
        $contacts = Contact::pluck('id');
        $cities = City::pluck('id');
        $states = State::pluck('id');
        $pincodes = Pincode::pluck('id');
        $countries = Country::pluck('id');
        return [
            'contact_id' => Contact::factory(),
            'address_type' => 'Primary',
            'address_1'=> $this->faker->address(),
            'address_2'=> $this->faker->address,
            'city_id' => $cities->random(),
            'state_id' => $states->random(),
            'pincode_id' => $pincodes->random(),
            'country_id' => $countries->random(),
            'gstin'=> 5,
            'email' => $this->faker->email(),

        ];
    }
}
