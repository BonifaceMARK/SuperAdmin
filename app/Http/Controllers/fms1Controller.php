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
use App\Models\FmsG2CostAllocation;
use App\Models\FmsG1CashManagement;
use App\Models\Pendingdocu;
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

        $costAllocations = FmsG2CostAllocation::all();

        $cashManagements = FmsG1CashManagement::all(); // Retrieve all records
        $totalRevenue = $cashManagements->sum('revenue');
        $totalIncome = $cashManagements->sum('income');
        $totalOutflow = $cashManagements->sum('outflow');
        $totalNetIncome = $cashManagements->sum('net_income');

        $approve = Pendingdocu::all();


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

       return view ('F1.index', compact('costAllocations','cashManagements','approve', 'totalRevenue', 'totalIncome', 'totalOutflow', 'totalNetIncome','freightPayments','taxPayments','payments','investments','salesCount', 'salesPercentage', 'revenueAmount', 'revenuePercentage', 'customersCount', 'customersPercentage'));
    }

    public function planningrequest(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'budget' => 'required|numeric',
            'submitted_by' => 'required|numeric',
            'created_at' => 'required|date|after:start_date',
        ]);

        $budgetPlan = Pendingdocu::create([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
            'submitted_by' => $request->submitted_by,
            'created_at' => $request->created_at,
        ]);
        return redirect()->back()->with('success', 'Financial planning has been created Waiting For Approval.');
    }
  public function allocate($id)
  {
      // Find the cost allocation record
      $costAllocation = FmsG2CostAllocation::findOrFail($id);

      // Deduct the cost from revenue
      $revenueToDeduct = $costAllocation->cost;

      // Check if revenue is sufficient
      if (!$this->isRevenueSufficient($revenueToDeduct)) {
          return redirect()->back()->with('error', 'Insufficient funds. Revenue amount is lower than the cost.');
      }

      // Deduct revenue
      $this->deductRevenue($revenueToDeduct);

      // Update the status of the cost allocation
      $costAllocation->status = 'Allocated';
      $costAllocation->save();

      // Redirect back or return a response as needed
      return redirect()->back()->with('success', 'Revenue deducted successfully and cost allocation updated.');
  }

  private function isRevenueSufficient($amount)
  {
      // Find or create the cash management record
      $cashManagement = FmsG1CashManagement::firstOrNew([]);

      // If revenue is null or zero, set it to zero
      if ($cashManagement->revenue === null || $cashManagement->revenue === 0) {
          $cashManagement->revenue = 0;
      }

      // Check if revenue is enough
      return $cashManagement->revenue >= $amount;
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
