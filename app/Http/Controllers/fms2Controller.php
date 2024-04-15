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

        return view('F2.index', compact(
            'taxPaymentsTotal',
            'paymentGatewayTotal',
            'freightPaymentsTotal',
            'fixedAssetPaymentsTotal',
            'adminPaymentsTotal'
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
