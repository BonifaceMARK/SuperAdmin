<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunAllSeeders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all database seeders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('db:seed', ['--class' => 'AdminPaymentsSeeder']);
        $this->call('db:seed', ['--class' => 'DatabaseSeeder']);
        $this->call('db:seed', ['--class' => 'FixedAssetPaymentSeeder']);
        $this->call('db:seed', ['--class' => 'HotelPaymentsSeeder']);
        $this->call('db:seed', ['--class' => 'PaymentGatewaySeeder']);
        $this->call('db:seed', ['--class' => 'RiskManagementSeeder']);
        $this->call('db:seed', ['--class' => 'TaxPaymentSeeder']);
        $this->call('db:seed', ['--class' => 'TaxPaymentsSeeder']);
        $this->call('db:seed', ['--class' => 'TransactionHistorySeeder']);
        // $this->call('db:seed', ['--class' => 'UserDescriptionSeeder']);
        $this->call('db:seed', ['--class' => 'UsersTableSeeder']);

        $this->info('All seeders executed successfully.');

        return 0;
    }
}
