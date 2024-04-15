<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
USE App\Http\Controllers\F3ClientController;
use App\Http\Controllers\fms5Controller;
use App\Http\Controllers\fms1Controller;
use App\Http\Controllers\fms2Controller;
use App\Http\Controllers\fms4Controller;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CostAllocationController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\RequestBudgetController;


use App\Http\Controllers\fms6Controller;
use App\Http\Controllers\fms7Controller;

use App\Http\Controllers\fms8Controller;
use App\Http\Controllers\G10Controller;


use App\Http\Controllers\EmployeeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',         [AuthController::class,'loadRegister']);
Route::post('/register',        [AuthController::class,'register'])->name('register');
Route::get('/loginload',        [AuthController::class,'loadLogin'])->name('loadlogin');
Route::post('/login',           [AuthController::class,'login'])->name('login');
Route::get('/logout',           [AuthController::class,'logout'])->name('logout');


// ********** Super Admin Routes *********
Route::group(['prefix' => 'superadmin','middleware'=>['web','isSuperAdmin']],function(){

    Route::get('/',[SuperAdminController::class,'dashboard']);
    Route::get('/dashboard',[SuperAdminController::class,'dashboard'])->name('home');


    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/users/{id}/edit', [SuperAdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [SuperAdminController::class, 'updateRole'])->name('users.update');
    Route::delete('/users/{id}', [SuperAdminController::class, 'destroy'])->name('users.destroy');

    // ********** F3 Routes *********
    Route::post('/clients/s{id}',           [F3ClientController::class, 'update'])->name('update');
    // Route::get('/dashboard',                [PendingController::class, 'indexp'])->name('dashboard');
    Route::get('/clients',                  [F3ClientController::class, 'indexpage'])->name('Clients');
    Route::get('/ap-ar-fetch-chart-data',   [F3ClientController::class, 'fetchChartData'])->name('fetchChartData');
    Route::get('/ap-ar-reports',            [F3ClientController::class, 'apar'])->name('apar');
    Route::get('/fix-asset-reports',        [F3ClientController::class, 'fixass'])->name('fixass');
    Route::get('/tax-management-reports',   [F3ClientController::class, 'taxfin'])->name('taxfin');
    Route::get('/bank',                     [F3ClientController::class, 'bank'])->name('bank');



    // PAYMENT GATEWAYS COMMUNICATION & COLLABORATION ACCOUNTING STANDARDS
    Route::get('/fms5index', [fms5Controller::class, 'fms5index'])->name('fms5.index');


    Route::post('/paymentgateways', [fms5Controller::class, 'storeHotel'])->name('paymentgateways.store');
    Route::post('/freight-payments', [fms5Controller::class, 'storeFreight'])->name('freightpayments.store');
    Route::post('/admin-payments', [fms5Controller::class, 'storeAdmin'])->name('adminpayments.store');
    Route::get('/chat', [fms5Controller::class, 'index'])->name('chat.index');
    Route::post('/chat/store', [fms5Controller::class, 'storeMessage'])->name('chat.store');
    Route::get('/chat/fetch', [fms5Controller::class, 'fetch'])->name('chat.fetch');
    Route::post('/fixedassetpayments', [fms5Controller::class, 'storeFixedAsset'])->name('fixedassetpayments.store');
    Route::post('/taxpayments', [fms5Controller::class, 'storeTax'])->name('taxpayments.store');

    // FINANCIAL PLANNING FINANCIAL REPORTING CASH MANAGEMENT
    Route::post('/financial-planning', [fms1Controller::class, 'storeBudgetPlan'])->name('budget-plans.store');
    Route::get('/fms1index', [fms1Controller::class, 'fms1index'])->name('fms1.index');


    // EXPENSE BUDGETING & FORECAST COST ALLOCATION MANAGEMENT
    Route::get('/fms2index', [fms2Controller::class, 'fms2index'])->name('fms2.index');
    Route::post('/cost-allocations',[fms2Controller::class, 'storeCostAllocation'])->name('cost-allocations.store');
    Route::get('/expenses', [fms2Controller::class, 'index']);
    Route::get('/tax-payment-data', [fms2Controller::class, 'getTaxPaymentData']);


    // GENERAL LEDGER AUDIT & COMPLIANCE
    Route::get('/fms4index', [fms4Controller::class, 'fms4index'])->name('fms4.index');

    // FINANCIAL ANALYTICS & BUSINESS INTELLIGENCE RISK MANAGEMENT
    Route::get('/fms6index', [fms6Controller::class, 'fms6index'])->name('fms6.index');


    // ACCOUNTS PAYABLE & RECEIVABLE
    Route::get('/fms7index', [fms7Controller::class, 'fms7index'])->name('fms7.index');
    Route::post('/generate-pdf', [fms7Controller::class, 'generatePDF']);


    // CREDIT MANAGEMENT & BANK RECONCILIATION
    Route::get('/fms8index', [fms8Controller::class, 'fms8index'])->name('fms8.index');




    // Route::get('/dashboard',        [SuperAdminController::class,'dashboard'])  ->name('home');
    Route::get('/users',            [SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',      [SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',     [SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/users/{id}/edit',  [SuperAdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}',           [SuperAdminController::class, 'updateRole'])->name('users.update');
    Route::delete('/users/{id}',        [SuperAdminController::class, 'destroy'])->name('users.destroy');



    // Route::GET('/home',                            [App\Http\Controllers\SuperadminController::class, 'home'])                       ->name('home');
    Route::GET('/user-management',                 [App\Http\Controllers\SuperadminController::class, 'usermanagement'])             ->name('user-management');
    Route::GET('/depreciation-calculation',        [App\Http\Controllers\SuperadminController::class, 'depreciation'])               ->name('user-depreciation');
    Route::GET('/customer-service',                [App\Http\Controllers\SuperadminController::class, 'cservice'])                   ->name('cservice');
    Route::GET('/tax-rate',                        [App\Http\Controllers\SuperadminController::class, 'tax'])                        ->name('taxrate');
    Route::GET('/tracking',                        [App\Http\Controllers\SuperadminController::class, 'tracking'])                   ->name('tracking');
    Route::GET('/announcement',                    [App\Http\Controllers\SuperadminController::class, 'announcement'])               ->name('announcement');
    Route::GET('/messaging',                       [App\Http\Controllers\SuperadminController::class, 'messaging'])                  ->name('messaging');
    Route::GET('/company',                         [App\Http\Controllers\SuperadminController::class, 'company'])                    ->name('company');
    Route::GET('/employee',                        [App\Http\Controllers\SuperadminController::class, 'employee'])                   ->name('employee');
    Route::GET('/reports',                         [App\Http\Controllers\SuperadminController::class, 'reportIndex'])                ->name('reports');
    Route::GET('/tax-calculation',                 [App\Http\Controllers\SuperadminController::class, 'taxcalculationIndex'])        ->name('taxcalculation');
    Route::GET('/asset/depreciation',              [App\Http\Controllers\SuperadminController::class, 'assetdepreciationIndex'])     ->name('assetdepreciation');
    Route::GET('/asset/details',                   [App\Http\Controllers\SuperadminController::class, 'assetdetailIndex'])           ->name('assetdetail');
    Route::GET('/asset/locations',                 [App\Http\Controllers\SuperadminController::class, 'assetlocationIndex'])         ->name('assetlocation');
    Route::GET('/asset/status',                    [App\Http\Controllers\SuperadminController::class, 'assetstatusIndex'])           ->name('assetstatus');
    Route::GET('/asset/maintenance',               [App\Http\Controllers\SuperadminController::class, 'assetmaintenanceIndex'])      ->name('assetmaintenance');
    Route::GET('/asset/transaction',               [App\Http\Controllers\SuperadminController::class, 'assettransactionIndex'])      ->name('assettransaction');

    // PROCESS
    Route::POST('/addusers',                       [App\Http\Controllers\SuperadminController::class, 'addusers'])                     ->name('addusers');
    Route::POST('/addroledatas',                   [App\Http\Controllers\SuperadminController::class, 'addroledatas'])                 ->name('addroledatas');
    Route::GET('/getusers',                        [App\Http\Controllers\SuperadminController::class, 'getusers'])                     ->name('getusers');
    Route::GET('/getusersdesc',                    [App\Http\Controllers\SuperadminController::class, 'getusersdesc'])                 ->name('getusersdesc');
    Route::GET('/getTaxes',                        [App\Http\Controllers\SuperadminController::class, 'getTaxes'])                     ->name('getTaxes');
    Route::GET('/getAssetInventory',               [App\Http\Controllers\SuperadminController::class, 'getAssetInventory'])            ->name('getAssetInventory');
    Route::GET('/getassetdetail',                  [App\Http\Controllers\SuperadminController::class, 'getassetdetail'])               ->name('getassetdetail');
    Route::GET('/getassetlocation',                [App\Http\Controllers\SuperadminController::class, 'getassetlocation'])             ->name('getassetlocation');
    Route::GET('/getassetstatus',                  [App\Http\Controllers\SuperadminController::class, 'getassetstatus'])               ->name('getassetstatus');
    Route::GET('/getassetmaintenance',             [App\Http\Controllers\SuperadminController::class, 'getassetmaintenance'])          ->name('getassetmaintenance');
    Route::GET('/getassettransaction',             [App\Http\Controllers\SuperadminController::class, 'getassettransaction'])          ->name('getassettransaction');

    ROUTE::POST('/reportidx',                      [App\Http\Controllers\SuperadminController::class, 'reportidx'])                    ->name('reportidx');




    Route::GET('/getdepreciation',                 [App\Http\Controllers\SuperadminController::class, 'getdepreciation'])              ->name('getdepreciation');
    Route::GET('/getassetdepreciation',            [App\Http\Controllers\SuperadminController::class, 'getassetdepreciation'])         ->name('getassetdepreciation');
    Route::POST('/recompute',                      [App\Http\Controllers\RecomputeAssetController::class, 'recdepreciation'])          ->name('recompute');
    Route::POST('/cmpassetdepreciation',           [App\Http\Controllers\SuperadminController::class, 'cmpassetdepreciation'])         ->name('cmpassetdepreciation');


    Route::POST('/report',                         [App\Http\Controllers\SuperadminController::class, 'generateReport'])                       ->name('report');




    Route::get('/employees', [EmployeeController::class, 'index'])->name('getEmployees');


    // Route::GET('/generate-report',              [App\Http\Controllers\ReportAccessController::class, 'generateReport'])    ->name('report');
    Route::POST('/storedata',                      [App\Http\Controllers\UniversalController::class, 'storedata'])            ->name('storedata');
    // Route::get('/storeinfo',                    [App\Http\Controllers\UniversalController::class, 'store'])               ->name('storeinfos');


    // // view blade
    // Route::get('/admintest',                    [App\Http\Controllers\HomeController::class,       'admin'])               ->name('admintest');
    // Route::get('/home',                         [App\Http\Controllers\SuperadminController::class, 'index'])               ->name('home');
    Route::GET('/configuration',                   [App\Http\Controllers\SuperadminController::class, 'configuration'])       ->name('configuration');
    Route::GET('/profile',                         [App\Http\Controllers\UniversalController::class, 'profile'])              ->name('profile');
    Route::GET('/statistic-reports',               [App\Http\Controllers\UniversalController::class, 'statistics'])           ->name('statistics');
    // // Route::get('admin/configuration',        [App\Http\Controllers\ConfigurationController::class, 'index'])        ->name('configuration');

    Route::POST('/notice',                         [App\Http\Controllers\UniversalProcess::class, 'isNotice'])                ->name('notice');

    // JAKE VENDOR AND INVESMENT WEB :) nagrredirect sayo pagkalogin ng superadmin

    // Route::get('dashboard', [G10Controller::class, 'dashboard'])->name('index.dashboard');
    Route::get('vendorManagement', [G10Controller::class, 'vendorDashboard'])->name('vendor.dashboard');
    Route::get('investmentManagement', [G10Controller::class, 'investmentDashboard'])->name('investment.dashboard');

    ////// Investment
    Route::get('/invest-receipt/{id}', [G10Controller::class,'printReceiptInvestment'])->name('receiptinvestment');
    ////// deposit
    Route::get('/print-receipt/{id}', [G10Controller::class,'printReceipt'])->name('print.receipt');

    //////VIEW EDIT
    Route::get('/edit/{id}', [G10Controller::class, 'viewVendor'])->name('edit.vendor');
    Route::put('/update/{id}', [G10Controller::class, 'updateVendor'])->name('update.vendor');  
    
    Route::get('/vendorview',[G10Controller::class,'vendorView'])->name('view.vendor');



    

    // F2 ROUTES
    Route::post('/change-password',                     [AuthController::class, 'changePassword'])->name('change.password');
    Route::get('/upload-image',                         [ImageController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload-image',                        [ImageController::class, 'uploadImage'])->name('upload.image');
    Route::post('/save-image',                          [ImageController::class, 'saveImage'])->name('save-image');
    Route::get('/forecast',                             [ForecastController::class, 'forecastIndex'])->name('forecast');
    // Route::get('/faqs',                                 [UserController::class, 'faq'])->name('faqs');
    // Route::get('/profile',                              [UserController::class, 'show'])->name('profile.show');
    // Route::get('/notify-view',                          [UserController::class, 'NotifyView'])->name('notify.view');
    // Route::get('/fetch-expense-sparkline',              [UserController::class, 'fetchExpenseSparkline']);
    // Route::get('/fetch-request-budget-sparkline',       [UserController::class, 'fetchRequestBudgetSparkline']);
    // Route::get('/fetch-cost-allocation-sparkline',      [UserController::class, 'fetchCostAllocationSparkline']);
    // Route::get('/notifications',                        [UserController::class, 'showNotifications'])->name('notifications.index');
    // Route::get('/expenses-data',                        [UserController::class, 'fetchExpensesData'])->name('fetch.expenses.data');
    // Route::get('/dashboard',                            [UserController::class,'dashboard'])->name('dash');
    // Route::get('/fetch-news',                           [USERController::class, 'fetchNews'])->name('fetch.news');

    Route::get('/fetch-expense-cost-allocation-data', [CostAllocationController::class, 'fetchExpenseCostAllocationData']);
    Route::get('/fetch-expense-data', [ExpenseController::class, 'fetchExpenseCategory'])->name('fetch.category.data');
    Route::get('/fetch-expense-chart-data', [ExpenseController::class, 'fetchExpenseChartData'])->name('fetch.expense.chart.data');
    Route::get('/fetch-expense-season-data', [ExpenseController::class, 'fetchExpenseSeasonData']);
    Route::get('/fetch-expense-chart-with-moving-average', [ExpenseController::class, 'fetchExpenseChartWithMovingAverage'])->name('fetch.expense.chart.moving.average');
    Route::get('/expenses/category', [ExpenseController::class, 'getCategoryExpenses'])->name('expenses.category');
    Route::get('/expenses',                                     [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('/expenses/create',                              [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses',                                    [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{expense}/edit',                      [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('/expenses/{expense}',                           [ExpenseController::class, 'update'])->name('expenses.update');
    Route::get('/expenses/{expense}',                           [ExpenseController::class, 'show'])->name('expenses.show');
    Route::delete('/expenses/{expense}',                        [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    Route::get('/cost_allocations',                             [CostAllocationController::class, 'index'])->name('cost_allocations.index');
    Route::get('/cost_allocations/create',                      [CostAllocationController::class, 'create'])->name('cost_allocations.create');
    Route::post('/cost_allocations',                            [CostAllocationController::class, 'store'])->name('cost_allocations.store');
    Route::get('/cost_allocations/{costAllocation}',            [CostAllocationController::class, 'show'])->name('cost_allocations.show');
    Route::get('/cost_allocations/{costAllocation}/edit',       [CostAllocationController::class, 'edit'])->name('cost_allocations.edit');
    Route::put('/cost_allocations/{costAllocation}',            [CostAllocationController::class, 'update'])->name('cost_allocations.update');
    Route::delete('/cost_allocations/{costAllocation}',         [CostAllocationController::class, 'destroy'])->name('cost_allocations.destroy');
    Route::get('/request_budgets',              [RequestBudgetController::class, 'index'])->name('request_budgets.index');
    Route::get('/request_budgets/create',       [RequestBudgetController::class, 'create'])->name('request_budgets.create');
    Route::post('/request_budgets',             [RequestBudgetController::class, 'store'])->name('request_budgets.store');
    Route::get('/request_budgets/{id}',         [RequestBudgetController::class, 'show'])->name('request_budgets.show');
    Route::get('/request_budgets/{id}/edit',    [RequestBudgetController::class, 'edit'])->name('request_budgets.edit');
    Route::put('/request_budgets/{id}',         [RequestBudgetController::class, 'update'])->name('request_budgets.update');
    Route::delete('/request_budgets/{id}',      [RequestBudgetController::class, 'destroy'])->name('request_budgets.destroy');
    Route::get('/budget-trends',                [RequestBudgetController::class, 'budgetTrends']);
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
    Route::get('/dashboard',        [SubAdminController::class,'dashboard'])->name('sub-admin.dash');
});
// ********** Admin Routes *********
    Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',            [AdminController::class,'dashboard'])->name('admin.dash');

});

// ********** User Routes *********
Route::group(['prefix' => 'user','middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',        [UserController::class,'dashboard'])->name('user.dash');


    Route::GET('/getAssetInventory',               [App\Http\Controllers\SuperadminController::class, 'getAssetInventory'])            ->name('mgetAssetInventory');
    Route::GET('/depreciation',                    [App\Http\Controllers\SuperadminController::class, 'depreciation'])                 ->name('mdepreciation');
    Route::GET('/tracking',                        [App\Http\Controllers\SuperadminController::class, 'tracking'])                     ->name('mtracking');

    // Route::get('/muser-management',                 [App\Http\Controllers\SuperadminController::class, 'managerusermanagement'])     ->name('muser-management');




    // Process
    Route::GET('/getdepreciation',                 [App\Http\Controllers\SuperadminController::class, 'getdepreciation'])           ->name('mgetdepreciation');
    Route::POST('/recompute',                      [App\Http\Controllers\RecomputeAssetController::class, 'recdepreciation'])       ->name('mrecompute');


    Route::GET('/generate-report',                 [App\Http\Controllers\ReportAccessController::class, 'generateReport'])          ->name('ugenerateReport');
    Route::POST('/notice',                         [App\Http\Controllers\UniversalProcess::class, 'isNotice'])                      ->name('unotice');


    // view blade
    Route::GET('/home',                  [App\Http\Controllers\UniversalController::class, 'index'])                      ->name('uhome');
    Route::GET('/track-maintenance',     [App\Http\Controllers\UniversalController::class, 'trackMaintenance'])           ->name('utrackmaintenance');
    Route::GET('/announcement',          [App\Http\Controllers\UniversalController::class, 'announcement'])               ->name('uannouncement');
    Route::GET('/tax-calculation',       [App\Http\Controllers\UniversalController::class, 'taxcalculation'])             ->name('utaxCal');
    Route::GET('/client',                [App\Http\Controllers\UniversalController::class, 'client'])                     ->name('uclient');
    Route::GET('/report',                [App\Http\Controllers\UniversalController::class, 'report'])                     ->name('ureport');
    Route::GET('/profile',               [App\Http\Controllers\UniversalController::class, 'profile'])                    ->name('uprofile');
    Route::GET('/help',                  [App\Http\Controllers\UniversalController::class, 'customerservice'])            ->name('uhelp');
});







