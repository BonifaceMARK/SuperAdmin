<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetCategory;
use App\Models\Report;
use App\Models\Expense;
use App\Models\CostAllocation;
use Carbon\Carbon;
use App\Models\CostCenter;
use Illuminate\Support\Facades\File;
use App\Models\BudgetPlan;
use App\Models\BudgetProposal;

class SubAdminController extends Controller
{
    public function dashboard()
    {

        return view('sub-admin.dashboard');
    }

}
