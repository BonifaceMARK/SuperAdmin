<?php

namespace App\Http\Controllers;
use App\Models\FinancialPlanning;
use Illuminate\Http\Request;
use App\Models\TaxPayment;
use App\Models\PaymentGateway;
use App\Models\FreightPayment;
use App\Models\FixedAssetPayment;
use App\Models\AdminPayment;
use App\Models\Investments;
use App\Models\BudgetPlan;
use App\Models\FmsG1CashManagement;
class fms1Controller extends Controller
{

    public function addToRevenue(Request $request, $id)
    {
        $taxPayment = TaxPayment::findOrFail($id);
        $amount = $taxPayment->amount;

        // Add the amount to revenue in cash management
        FmsG1CashManagement::addRevenue($amount);

        return redirect()->back()->with('success', 'Revenue added successfully!');
    }

    public function fms1index()
    {

        $cashManagements = FmsG1CashManagement::all(); // Retrieve all records
        $totalRevenue = $cashManagements->sum('revenue');
        $totalIncome = $cashManagements->sum('income');
        $totalOutflow = $cashManagements->sum('outflow');
        $totalNetIncome = $cashManagements->sum('net_income');

          $salesCount = AdminPayment::count();

          $lastMonthSalesCount = AdminPayment::whereMonth('created_at', now()->subMonth()->month)->count();
          $salesPercentage = $lastMonthSalesCount ? (($salesCount - $lastMonthSalesCount) / $lastMonthSalesCount) * 100 : 0;
          $taxPayments = TaxPayment::all();

          $revenueAmount = FixedAssetPayment::sum('amount');

          $lastMonthRevenueAmount = FixedAssetPayment::whereMonth('created_at', now()->subMonth()->month)->sum('amount');
          $revenuePercentage = $lastMonthRevenueAmount ? (($revenueAmount - $lastMonthRevenueAmount) / $lastMonthRevenueAmount) * 100 : 0;
          $freightPayments = FreightPayment::all();

          $customersCount = PaymentGateway::count();

          $lastYearCustomersCount = PaymentGateway::whereYear('created_at', now()->subYear()->year)->count();
          $customersPercentage = $lastYearCustomersCount ? (($customersCount - $lastYearCustomersCount) / $lastYearCustomersCount) * 100 : 0;
        $payments = FixedAssetPayment::all();
        $investments = Investments::all();

       return view ('F1.index', compact('cashManagements', 'totalRevenue', 'totalIncome', 'totalOutflow', 'totalNetIncome','freightPayments','taxPayments','payments','investments','salesCount', 'salesPercentage', 'revenueAmount', 'revenuePercentage', 'customersCount', 'customersPercentage'));
    }

    public function storeBudgetPlan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'target_revenue' => 'required|numeric',
            'target_expense' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $budgetPlan = BudgetPlan::create([
            'name' => $request->name,
            'description' => $request->description,
            'target_revenue' => $request->target_revenue,
            'target_expense' => $request->target_expense,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->back()->with('success', 'Financial planning has been successfully added.');
    }
}
