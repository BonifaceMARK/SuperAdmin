<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreightPayment;
use App\Models\PaymentGateway;
use App\Models\AdminPayment;
use App\Models\RiskManagement;
use App\Models\TaxPayment;
use App\Models\FixedAssetPayment;
use App\Models\FmsG2Budget;
use App\Models\BudgetPlan;
use App\Models\FmsG2CostAllocation;
class fms6Controller extends Controller
{
    public function fms6index()
    {
        $riskManagements = RiskManagement::all();
        $costAllocations = FmsG2CostAllocation::all();
        $paymentData = PaymentGateway::all();
        $freightData = FreightPayment::all();
        $adminData = AdminPayment::all();
        $budgetPlans  = BudgetPlan::all();

           // Retrieve data from models
           $taxData = TaxPayment::sum('amount');
           $paymentData = PaymentGateway::sum('transactionAmount');
           $budgetData = FmsG2Budget::sum('amount');
           $fixedAssetData = FixedAssetPayment::sum('amount');
           $adminData = AdminPayment::sum('amount');
        return view('F6.index', compact('budgetPlans','taxData', 'paymentData', 'budgetData', 'fixedAssetData', 'adminData','riskManagements','costAllocations','paymentData', 'freightData', 'adminData'));
    }
    public function updateSeverity(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'severity' => 'required|integer|min:0|max:100', // Add any additional validation rules if needed
    ]);

    // Find the budget plan by its ID
    $budgetPlan = BudgetPlan::findOrFail($id);

    // Update the severity attribute with the new value from the request
    $budgetPlan->update([
        'severity' => $request->severity,
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Severity updated successfully!');
}

    public function storeRiskCost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'severity' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        // Create a new risk management instance
        $riskManagement = new RiskManagement();
        $riskManagement->title = $request->title;
        $riskManagement->description = $request->description;
        $riskManagement->severity = $request->severity;
        $riskManagement->status = $request->status;

        // Save the risk management
        $riskManagement->save();

        // Redirect to the index page with success message
        return redirect()->route('fms6.index')->with('success', 'Risk Management created successfully.');
    }
}
