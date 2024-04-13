<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\CostAllocation;
use App\Models\RequestBudget;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        // $user = Auth::user();
        // $expenses = Expense::where('user_id', $user->id)->get();
        // $cost_allocations = CostAllocation::where('user_id', $user->id)->get();
        // $request_budgets = RequestBudget::where('user_id', $user->id)->get();
        // $budget_plans = BudgetPlan::where('user_id', $user->id)->get();
        // $budget_proposals = BudgetProposal::where('user_id', $user->id)->get();

        // return view('user.dashboard', compact('expenses', 'cost_allocations','request_budgets', 'budget_plans', 'budget_proposals'));
        

        $info = Auth::user();
        if($info->role == '0'){
            return view('accessible.dashboard');
        }
  
        
    }

}
