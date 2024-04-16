<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreightPayment;
use App\Models\FmsG1CashManagement;
class fms8Controller extends Controller
{
    public function fms8index()
    {
    // Fetch cash management data from the database
    $cashManagement = FmsG1CashManagement::firstOrFail(); // Adjust query as needed

    // Determine financial health status based on net income
    $financialHealthStatus = $cashManagement->net_income >= 0 ? 'Healthy' : 'Poor';
  $activities = FmsG1CashManagement::all();
       return view ('F8.index', compact('activities','cashManagement', 'financialHealthStatus'));
    }
}
