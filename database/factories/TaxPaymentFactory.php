<?php

namespace Database\Factories;

use App\Models\TaxPayment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class TaxPaymentFactory extends Factory
{
    protected $model = TaxPayment::class;

    public function definition()
    {
        return [
            'taxpayer_name' => $this->faker->name,
            'tax_type' => $this->faker->randomElement(['Sales Tax', 'Income Tax', 'Property Tax']),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'Cash', 'Bank Transfer']),
            'status' => $this->faker->randomElement(['Paid', 'Pending', 'Overdue']),
        ];
    }
}
