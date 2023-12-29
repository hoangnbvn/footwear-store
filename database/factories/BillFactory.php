<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  User::all()->random()->id,
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'Bank Transfer', 'PayPal']),
            'shipping_method' => $this->faker->randomElement(['Standard Shipping', 'Express Shipping']),
            'status' => $this->faker->randomElement(['Pending', 'Cancelled', 'Manual verification required', 'Confirmed', 'Declined', 'Awaiting shipment', 'Being shipped', 'Complete shipping', 'Being returned', 'Completed']),
            'address' => $this->faker->address(),
        ];
    }
}
