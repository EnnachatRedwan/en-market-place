<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->randomNumber(3),
            'seller_email'=>$this->faker->email(),
            'seller_phone_number'=>$this->faker->phoneNumber(),
            'location'=>$this->faker->address(),
        ];
    }
}
