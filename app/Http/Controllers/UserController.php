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




    return view('user.dashboard');
}




}
