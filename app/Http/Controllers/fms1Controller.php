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
class fms1Controller extends Controller
{

    public function fms1index()
    {
          // Fetch data for sales card (e.g., count of admin payments)
          $salesCount = AdminPayment::count();
          // Calculate sales percentage
          $lastMonthSalesCount = AdminPayment::whereMonth('created_at', now()->subMonth()->month)->count();
          $salesPercentage = $lastMonthSalesCount ? (($salesCount - $lastMonthSalesCount) / $lastMonthSalesCount) * 100 : 0;
          $taxPayments = TaxPayment::all();
          // Fetch data for revenue card (e.g., total amount of fixed asset payments)
          $revenueAmount = FixedAssetPayment::sum('amount');
          // Calculate revenue percentage
          $lastMonthRevenueAmount = FixedAssetPayment::whereMonth('created_at', now()->subMonth()->month)->sum('amount');
          $revenuePercentage = $lastMonthRevenueAmount ? (($revenueAmount - $lastMonthRevenueAmount) / $lastMonthRevenueAmount) * 100 : 0;
          $freightPayments = FreightPayment::all();
          // Fetch data for customers card (e.g., count of payment gateways)
          $customersCount = PaymentGateway::count();
          // Calculate customers percentage
          $lastYearCustomersCount = PaymentGateway::whereYear('created_at', now()->subYear()->year)->count();
          $customersPercentage = $lastYearCustomersCount ? (($customersCount - $lastYearCustomersCount) / $lastYearCustomersCount) * 100 : 0;
        $payments = FixedAssetPayment::all();
        $investments = Investments::all();
       return view ('F1.index', compact('freightPayments','taxPayments','payments','investments','salesCount', 'salesPercentage', 'revenueAmount', 'revenuePercentage', 'customersCount', 'customersPercentage'));
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
