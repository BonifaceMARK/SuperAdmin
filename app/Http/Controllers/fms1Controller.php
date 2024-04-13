<?php

namespace App\Http\Controllers;
use App\Models\FinancialPlanning;
use Illuminate\Http\Request;

class fms1Controller extends Controller
{

    public function fms1index()
    {


       return view ('F1.index');
    }
    public function storeBudgetPlan(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_revenue' => 'required|numeric',
            'target_expense' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Create a new financial planning instance
        $financialPlanning = FinancialPlanning::create($validatedData);

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Financial planning has been successfully added.');
    }
}
