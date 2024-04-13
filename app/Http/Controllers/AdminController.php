<?php

namespace App\Http\Controllers;
use App\Models\BudgetPlan;
use App\Models\BudgetProposal;
use App\Models\CostAllocation;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\Report;
use App\Models\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
