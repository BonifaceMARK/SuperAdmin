<?php
// FixedAssetPaymentFactory.php

namespace Database\Factories;

use App\Models\FixedAssetPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class FixedAssetPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FixedAssetPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asset_name' => $this->faker->word,
            'asset_description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'payment_date' => $this->faker->dateTimeThisMonth(),
            'payment_method' => $this->faker->randomElement(['Cash', 'Credit Card', 'Bank Transfer']),
            'payment_reference' => $this->faker->uuid,
            'status' => $this->faker->randomElement(['Paid', 'Pending', 'Failed']),
        ];
    }
}

