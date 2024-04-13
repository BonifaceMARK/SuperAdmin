<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


USE App\Http\Controllers\PendingController;
USE App\Http\Controllers\ClientController;
USE App\Http\Controllers\Reports;
use App\Http\Controllers\fms5Controller;



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
Route::get('/logout',           [AuthController::class,'logout']);


// ********** Super Admin Routes *********
Route::group(['prefix' => 'superadmin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/users/{id}/edit', [SuperAdminController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [SuperAdminController::class, 'updateRole'])->name('users.update');
Route::delete('/users/{id}', [SuperAdminController::class, 'destroy'])->name('users.destroy');




// PAYMENT GATEWAYS COMMUNICATION & COLLABORATION ACCOUNTING STANDARDS
Route::get('/fms5pay', [fms5Controller::class, 'fms5payment'])->name('payment');
Route::get('/fms5com', [fms5Controller::class, 'fms5communication'])->name('communication');
Route::get('/fms5stan', [fms5Controller::class, 'fms5standards'])->name('standards');

Route::post('/paymentgateways', [fms5Controller::class, 'storeHotel'])->name('paymentgateways.store');
Route::post('/freight-payments', [fms5Controller::class, 'storeFreight'])->name('freightpayments.store');
Route::post('/admin-payments', [fms5Controller::class, 'store'])->name('admin.payments.store');


















    Route::get('/dashboard',        [SuperAdminController::class,'dashboard']);
    Route::get('/users',            [SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',      [SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',     [SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/users/{id}/edit',  [SuperAdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}',           [SuperAdminController::class, 'updateRole'])->name('users.update');
    Route::delete('/users/{id}',        [SuperAdminController::class, 'destroy'])->name('users.destroy');



    Route::GET('/home',                            [App\Http\Controllers\SuperadminController::class, 'home'])                       ->name('home');
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
    Route::GET('/getdepreciation',                 [App\Http\Controllers\SuperadminController::class, 'getdepreciation'])              ->name('mgetdepreciation');
    Route::POST('/recompute',                      [App\Http\Controllers\RecomputeAssetController::class, 'recdepreciation'])          ->name('mrecompute');







    Route::GET('/generate-report',       [App\Http\Controllers\ReportAccessController::class, 'generateReport'])          ->name('ugenerateReport');
    Route::POST('/notice',               [App\Http\Controllers\UniversalProcess::class, 'isNotice'])                      ->name('unotice');


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






// ********** F3 Routes *********
Route::post('/f3/clients/s{id}',           [ClientController::class, 'update'])->name('update');
// Route::get('/dashboard',                [PendingController::class, 'indexp'])->name('dashboard')->middleware(['auth']);
Route::get('/f3/clients',                  [PendingController::class, 'indexpage'])->name('Clients')->middleware(['auth']);
Route::get('/ap-ar-fetch-chart-data',   [Reports::class, 'fetchChartData'])->name('fetchChartData');
Route::get('/f3/ap-ar-reports',            [Reports::class, 'apar'])->name('apar')->middleware(['auth']);
Route::get('/fix-asset-reports',        [Reports::class, 'fixass'])->name('fixass')->middleware(['auth']);
Route::get('/f3/tax-management-reports',   [Reports::class, 'taxfin'])->name('taxfin')->middleware(['auth']);

Route::get('/f3/bank',                     [Reports::class, 'bank'])->name('bank')->middleware(['auth']);
