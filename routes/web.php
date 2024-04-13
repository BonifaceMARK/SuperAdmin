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
    Route::get('/dashboard',        [SuperAdminController::class,'dashboard']);
    Route::get('/users',            [SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',      [SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',     [SuperAdminController::class,'updateRole'])->name('updateRole');
    Route::get('/users/{id}/edit',  [SuperAdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}',           [SuperAdminController::class, 'updateRole'])->name('users.update');
    Route::delete('/users/{id}',        [SuperAdminController::class, 'destroy'])->name('users.destroy');
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
