<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiskManagement;

class RiskManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $riskData = [
            [
                'risk_name' => 'Data Security Breach',
                'description' => 'Potential data breach due to outdated security measures.',
                'category' => 'Cybersecurity',
                'status' => 'Pending',
                'probability' => 5,
                'impact' => 8,
                'severity' => 40,
            ],
            [
                'risk_name' => 'Market Volatility',
                'description' => 'High market volatility affecting investment returns.',
                'category' => 'Financial',
                'status' => 'Pending',
                'probability' => 7,
                'impact' => 6,
                'severity' => 42,
            ],
            // Add more risk data as needed
        ];

        // Insert data into the database
        foreach ($riskData as $risk) {
            RiskManagement::create($risk);
        }
    }
}
