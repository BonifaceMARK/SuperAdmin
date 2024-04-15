<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FmsG2CostAllocation;
use App\Models\TaxPayment;
use App\Models\PaymentGateway;
use App\Models\FreightPayment;
use App\Models\FixedAssetPayment;
use App\Models\AdminPayment;
use App\Models\Investments;
use App\Models\FmsG1CashManagement;

class fms2Controller extends Controller
{


    public function fms2index()
    {
        // Fetch investments data
        $investments = Investments::all();
        $payments = FixedAssetPayment::all();
        // Fetch payments data
        $taxPayments = TaxPayment::all();
        $paymentGateways = PaymentGateway::all();
        $freightPayments = FreightPayment::all();
        $fixedAssetPayments = FixedAssetPayment::all();
        $adminPayments = AdminPayment::all();

        // Calculate totals
        $taxPaymentsTotal = $taxPayments->sum('amount');
        $paymentGatewayTotal = $paymentGateways->sum('transactionAmount');
        $freightPaymentsTotal = $freightPayments->sum('freightAmount');
        $fixedAssetPaymentsTotal = $fixedAssetPayments->sum('amount');
        $adminPaymentsTotal = $adminPayments->sum('amount');

        // Format data for ApexCharts
        $taxData = $taxPayments->pluck('amount')->toArray();
        $paymentGatewayData = $paymentGateways->pluck('transactionAmount')->toArray();
        $freightData = $freightPayments->pluck('freightAmount')->toArray();
        $fixedAssetData = $fixedAssetPayments->pluck('amount')->toArray();
        $adminData = $adminPayments->pluck('amount')->toArray();

        // Merge data from all models into a single dataset
        $allPayments = collect([
            'Tax Payments' => $taxPayments,
            'Payment Gateways' => $paymentGateways,
            'Freight Payments' => $freightPayments,
            'Fixed Asset Payments' => $fixedAssetPayments,
            'Admin Payments' => $adminPayments
        ]);
        $adminPayments = AdminPayment::all();
        $fixedAssetPayments = FixedAssetPayment::all();
        $freightPayments = FreightPayment::all();
        $paymentGateways = PaymentGateway::all();
        $taxPayments = TaxPayment::all();

        // Combine data from all models into a single dataset



        return view('F2.index', compact(
            'taxPaymentsTotal',
            'paymentGatewayTotal',
            'freightPaymentsTotal',
            'fixedAssetPaymentsTotal',
            'adminPaymentsTotal',
            'payments',
            'investments',
            'taxData',
            'paymentGatewayData',

            'freightData',
            'fixedAssetData',
            'adminData',
            'taxPayments' // Make sure to pass $taxPayments to the view
        ));
    }

// Example usage:
    function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
    }

    public function index()
    {
        // Retrieve data from each model
        $freightData = FreightPayment::select('freightDate as payment_date', 'freightAmount as amount')->get();
        $fixedAssetData = FixedAssetPayment::select('payment_date', 'amount')->get();
        $adminData = AdminPayment::select('paymentDate as payment_date', 'amount')->get();
        $taxPayments = TaxPayment::select('payment_date', 'amount')->get();

        // Merge all payment data
        $allPayments = $freightData->merge($fixedAssetData)->merge($adminData)->merge($taxPayments);

        // Group payments by date and calculate total revenue for each date
        $revenueByDate = $allPayments->groupBy('payment_date')->map(function ($payments) {
            return $payments->sum('amount');
        });

        // Sort revenue by date
        $revenueByDate = $revenueByDate->sortKeys();

        // Prepare data for chart
        $chartData = [
            'dates' => $revenueByDate->keys()->toJson(),
            'revenue' => $revenueByDate->values()->toJson(),
        ];

        // Pass data to the view
        return view('F2.index', compact('chartData', 'freightData', 'fixedAssetData', 'adminData', 'taxPayments'));
    }

    public function getTaxPaymentData()
    {
        // Retrieve historical tax payment data
        $historicalData = TaxPayment::select('payment_date', 'amount')->orderBy('payment_date')->get();

        // Apply exponential smoothing
        $smoothedData = $this->applyExponentialSmoothing($historicalData);

        // Return the smoothed data as JSON
        return response()->json($smoothedData);
    }

    // Function to apply exponential smoothing
    private function applyExponentialSmoothing($historicalData, $alpha = 0.2) {
        $smoothedData = [];

        $previousSmoothedValue = null;
        foreach ($historicalData as $entry) {
            $amount = $entry->amount;

            if ($previousSmoothedValue === null) {
                // For the first data point, use the actual amount
                $smoothedValue = $amount;
            } else {
                // Apply exponential smoothing
                $smoothedValue = $alpha * $amount + (1 - $alpha) * $previousSmoothedValue;
            }

            // Store the smoothed value for this data point
            $smoothedData[] = [
                'payment_date' => $entry->payment_date,
                'smoothed_amount' => $smoothedValue,
            ];

            // Update the previous smoothed value for the next iteration
            $previousSmoothedValue = $smoothedValue;
        }

        return $smoothedData;
    }

    public function storeCostAllocation(Request $request)
{
    $request->validate([
        'reference_no' => 'nullable|numeric',
        'cost' => 'required',
        'cost_type' => 'required',
        'created_by' => 'required|string', // Assuming 'created_by' is a string field
        'budget' => 'nullable|numeric',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
    ]);

    $randomString = $this->generateRandomString(10);
    FmsG2CostAllocation::create([
        'reference_no' => $randomString,
        'cost' => $request->input('cost'),
        'cost_type' => $request->input('cost_type'),
        'description' => $request->input('description'),
        'budget' => $request->input('budget'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'created_by' => $request->input('created_by'),
    ]);

    return redirect()->route('fms2.index')->with('success', 'Cost allocation created successfully!');
}

}
