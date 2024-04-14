<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserDescription;




use Illuminate\Support\Facades\Response;
// use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
// use App\Models\User;
use Laravel\Ui\Presets\React;
use Termwind\Components\Raw;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;


use App\Models\Account;
use App\Models\Payouts;
use App\Models\Investments;
use App\Models\DepositRequest;
use App\Models\InvestmentRequest;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {

        $userCount = User::where('role', '=', 0)->count();

        $investment = DB::table('fms10_investments')->sum(DB::raw('CAST(amount AS DECIMAL(10, 2))'));

        $countBalance = DB::table('fms10_accounts')->sum(DB::raw('CAST(balance AS DECIMAL(10, 2))'));

        $data = Payouts::whereNotNull('amount')->sum('amount');

        return view('superadmin.dashboard', compact('countBalance','investment','data','userCount'));

    }

    public function users()
    {
        $users = User::with('roles')->where('role','!=',1)->get();
        return view('superadmin.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        return view('superadmin.manage-role', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('superadmin.manage-role', compact('user'));
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('manageRole')->with('success', 'User deleted successfully');
}
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('manageRole')->with('success', 'User updated successfully');
}




public function reportIndex() {
    return view('admin.assetreport');
}

public function assettransactionIndex() {
    return view('admin.assettransaction');
}

public function assetmaintenanceIndex() {
    return view('admin.assetmaintenance');
}

public function assetstatusIndex(){
    return view('admin.assetstatus');
}

public function assetlocationIndex(){
    return view('admin.assetlocation');
}

public function assetdepreciationIndex(){
    return view('admin.assetdepreciation');
}

public function assetdetailIndex(){
    return view('admin.assetdetail');
}

public function taxcalculationIndex(){
    return view('admin.taxcalculation');
}

public function employee(Request $request) {

    return view('admin.employee');
    
}

public function company(Request $request) {

    return view('admin.company');
    
}

public function messaging(Request $request) {
    return view('admin.messaging');
}

public function announcement(Request $request) {
    return view('admin.announcement');
}

public function index(Request $request){
    // dd(Auth::user(),$request->all());         
    $path = "";
    $path = view('manager/index');
    
    return $path;
}

public function tracking(){
    return view('admin/tracking');
}

public function cservice(){
    return view('admin/cservice');
}

public function tax(){
    return view('admin/tax');
}

public function home(Request $request){
    return view('admin/home');
}


public function configuration(Request $request){

    
    return view('manager/configuration');

}   

public function usermanagement(Request $request){
    return view('admin/user-management');
}



public function depreciation(Request $request){
    return view('financial/depreciation');
}

public function generateReport(Request $request){
    // dd($request);
}

public function cmpassetdepreciation(Request $request){
    // dd($request->all());
    $requestData = (object) $request; 

    if(!$requestData->target)
    {
        $method = DB::table('fms_g9_depreciationmethods')
            ->select('MethodName')
            ->where('MethodID', $requestData->targetmethod)
            ->first();  

            // if()
            // dd($method);

            if($method){

                DB::table('fms_g9_asset_empdepreciation')
                ->where('depreciation_method', $method->MethodName)
                ->update([
                    'depreciation_result' => DB::raw('(depreciation_rate / 100) * (DATEDIFF(NOW(), depreciation_start_date) / 365)')
                ]);    


          

                
                      // Return success response if update is successful
                return response()->json(['success' => true, 'message' => $method->MethodName.' data has been successfully updated !']);

            } else {
                
                DB::table('fms_g9_asset_empdepreciation')
                ->update([
                    'depreciation_result' => DB::raw('(depreciation_rate / 100) * (DATEDIFF(NOW(), depreciation_start_date) / 365)')
                ]);    
    
    
                return response()->json(['success' => true, 'message' => 'All data has been successfully updated !']);
            }

            
            
    } else {
      

        

    }
    






//     } else {
//         return response()->json(['success' => false, 'message' => 'Depreciation expense calculation failed']);
//     }
// } else {
 
//     return response()->json(['success' => false, 'message' => 'Asset not found'], 404);
// }

    
}

public function getassettransaction(Request $request) {

    $requestData = (object) $request; 
    

    try {

        $asset = DB::table('fms_g9_financial_transaction')->get();
                
            $formattedPromotions = [];
            foreach ($asset as $data) {
            
                $assetname = DB::table('fms_g9_assets')->select('AssetName')->where('AssetID',$data->assetid)->first();
                // dd($assetname);
                // $date = new DateTime($data->transaction_date);
                // $formatted_date = $date->format("F j, Y");

                
            $timestamp = strtotime($data->transaction_date);
            $formattedDate = date("F j, Y", $timestamp);
       

  
                $formattedPromotions[] = [
                    
                    'transaction_id'                   => $data->transaction_id,
                    'assetid'                          => $assetname->AssetName ?? '',
                    'employeeid'                       => $data->employeeid,
                    'transaction_type'                 => $data->transaction_type,
                    'transaction_date'                 => $formattedDate,
                    'Transaction_Description'           => $data->Transaction_Description,
                    'amount'                           => $data->amount,
                    
                ];

            }
       

        return response()->json($formattedPromotions);
    
    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function getassetmaintenance(Request $request) {

    $requestData = (object) $request; 

    try {

        $asset = DB::table('fms_g9_asset_maintenance')->get();
        
        $formattedPromotions = [];
        foreach ($asset as $data) {

            $assetname = DB::table('fms_g9_assets')->select('AssetName')->where('AssetID',$data->asset_id)->first();
            
            $formattedPromotions[] = [
                
                'maintenance_id'             => $data->maintenance_id,
                'asset_id'                   => $assetname->AssetName,
                'maintenance_date'           => $data->maintenance_date,
                'maintenance_type'           => $data->maintenance_type,
                'maintenance_description'    => $data->maintenance_description,
                'maintenance_cost'           => $data->maintenance_cost,
                'maintenance_notes'          => $data->maintenance_notes,
                
            ];

        }

        return response()->json($formattedPromotions);
    
    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function getassetstatus(Request $request) {

    $requestData = (object) $request; 

    try {

        $asset = DB::table('fms_g9_asset_status')->get();
        
        $formattedPromotions = [];
        foreach ($asset as $data) {

            $formattedPromotions[] = [

                
                'Status_ID'      => $data->status_id,
                'Status_Name'    => $data->status_name,
                'Description'      => $data->description,
                
            ];

        }

        return response()->json($formattedPromotions);
    
    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function getassetlocation(Request $request) {

    $requestData = (object) $request; 

    try {

        $asset = DB::table('fms_g9_asset_location')->get();
        
        $formattedPromotions = [];
        foreach ($asset as $data) {

            $formattedPromotions[] = [

                
                'Location_ID'      => $data->Location_ID,
                'Location_Name'    => $data->Location_Name,
                'Description'      => $data->Description,
                'Address'          => $data->Address,
                'City'             => $data->City,
                'State'            => $data->State,
                'Country'          => $data->Country,
                'Postal_Code'      => $data->Postal_Code,
                
            ];

        }

        return response()->json($formattedPromotions);
    
    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function getassetdetail(Request $request) {

    $requestData = (object) $request; 

    try {

        $asset = DB::table('fms_g9_asset_detail')->get();
        
        $formattedPromotions = [];
        foreach ($asset as $data) {

            $formattedPromotions[] = [

                
                'Asset_ID'        => $data->Asset_ID,
                'Asset_Name'      => $data->Asset_Name,
                'Description'     => $data->Description,
                'Purchase_Date'   => $data->Purchase_Date,
                'Purchase_Price'  => $data->Purchase_Price,
                'Current_Value'   => $data->Current_Value,
                'Asset_Category'  => $data->Asset_Category,
                'Asset_Type'      => $data->Asset_Type,
                
            ];

        }

        return response()->json($formattedPromotions);
    
    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function getassetdepreciation(Request $request){
   
    $requestData = (object) $request; 

    try {

             
    $id ="";

    $usersQuery = DB::table('fms_g9_asset_empdepreciation')
            ->leftjoin('_personaldata','_personaldata.employeeid','fms_g9_asset_empdepreciation.employeeid');


    // if($requestData->acat) $db 
    if($requestData->amethod)   
    
    $id = DB::table('fms_g9_depreciationmethods')
            ->select('MethodName')
            ->where('MethodID',$requestData->amethod)->first();
         
    if($id) $usersQuery = $usersQuery->where('depreciation_method',$id->MethodName);
   
    // dd($requestData); 
    $usersQuery = $usersQuery->get();


    $formattedPromotions = [];
    foreach ($usersQuery as $data) {

        $formattedPromotions[] = [
            'empid'    => $data->employeeid,
            'depreciation_method' => $data->depreciation_method,
            'depreciation_result' => $data->depreciation_result,
            'depreciation_rate' => $data->depreciation_rate,
            'depreciation_start_date' => $data->depreciation_start_date,
            'original_cost' => '₱'.number_format($data->original_cost,2)
        ];
        

    }

        return response()->json($formattedPromotions);

    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }


}


public function getdepreciation(Request $request){

    try {

        $requestData = (object) $request; 
        // dd($requestData);
        $usersQuery = DB::table('fms_g9_assets');

        if($requestData->acat)    $usersQuery = $usersQuery->where('CategoryID',$requestData->acat);
        if($requestData->amethod) $usersQuery = $usersQuery->where('DepreciationMethodID',$requestData->amethod);

        $usersQuery = $usersQuery->get();

     
        $formattedPromotions = [];
        foreach ($usersQuery as $data) {
      

            $timestamp = strtotime($data->AcquisitionDate);
            $formattedDate = date("F j, Y", $timestamp);
       

            $formattedPromotions[] = [

                'id'        => $data->AssetID,
                'aname'     => $data->AssetName,
                'adata'     => $formattedDate,
                'icost'     => '₱'.$data->InitialCost,
                'uyears'    => $data->UsefulLifeInYears,
                'svalue'    => '₱'.$data->SalvageValue,
                'dmethod'   => $data->DepreciationMethod ?: '',
                'dExpenses' => '₱'.number_format($data->DepreciationExpense ?: '0',2),

            ];
            
        }
        // dd($formattedPromotions);
        return response()->json($formattedPromotions);

    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}


public function addusers(Request $request){

    try {
        $var = (object) $request;
        // dd($var);

        if($var->newpass != $var->confirmpass){
            return response()->json([
             'status' => 400,
             'message' => 'Passwords do not match'
            ], 400);
        }
        
        $taken = User::where('email', $var->pemail)->exists();

        if (!$taken) {


            // dd($var);

            // $role = '';

            // if($var->selRole == '15'){
            //     $role = $var->selRole;
            // }


            $year = now()->year;
            $latestUserId = User::where('userid', 'like', $year . '%')->max('userid');
            $incrementedNumber = intval(substr($latestUserId, 4)) + 1;
            $userID = $year . sprintf('%04d', $incrementedNumber);


            $desc = UserDescription::where('usertype', $var->selRole)->first();
            
            User::insert([

                'name' => $var->lname.', '.$var->fname.' '.$var->mname,
                'email' => $var->pemail,
                'password' => bcrypt($var->newpass),
                'department' => $desc->userdesc,
                'role' =>  $var->selRole, 
                'userid'   => $userID,
                'created_at' => now(),
                'updated_at' => now()

            ]);

            DB::table('_personaldata')->insert([
                'fname' => $var->fname ?: '',
                'lname' => $var->lname ?: '',
                'mname' => $var->mname ?: '',
                'isactive' => '1',
                'branch' => $var->branch ?: '1',
                'employeeid' => $userID,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $response = 'User account has been successfully created!';

        } else {

            $response = 'Email already taken. Please choose a different email.';

        }
        
    } catch (QueryException $e) {
      
        $response = 'An error occurred while creating the user. ' . $e->getMessage();

    }

    return response()->json(['message' => $response]);
}

public function getusers(Request $request){

    $requestData = (object) $request;

    // $usersQuery = DB::table('fms_g9_users as u')
    //         ->select('userid','name','u.email','usertype')
    //         ->leftjoin('_personaldata as pd','pd.employeeid','u.userid');
    
    // dd($formattedPromotions);

    try {
  
        $usersQuery = User::select('users.userid','name','users.email','role')
    ->leftjoin('_personaldata as pd','pd.employeeid','users.userid');

    if ($requestData->roleSelector != "") {
        $usersQuery = $usersQuery->where('role', '=', $requestData->roleSelector);
    }

    $usersQuery = $usersQuery->get();
    
    $formattedPromotions = [];
    foreach ($usersQuery as $data) {
       
        $formattedPromotions[] = [
            'id' => $data->userid ?: 'N/A',
            'Name' => $data->name,
            'MicrosoftEmail' => $data->email,
            'PersonalEmail' => $data->email,
            'usertype' =>  $this->userdesc($data->role)
        ];
    }

        return response()->json($formattedPromotions);

        

    } catch (\Exception $e) {
 
        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }
}

public function getusersdesc(Request $request){

    try {

        $requestData = (object) $request; 

        $usersQuery = DB::table('fms_g9_tbluserdescrip')->get();
     
        $formattedPromotions = [];
        foreach ($usersQuery as $data) {
           
            $formattedPromotions[] = [
                'usertype' => $data->usertype,
                'userdesc' => $data->userdesc
            ];
            
        }

        return response()->json($formattedPromotions);

    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function getTaxes(Request $request){

    $taxQuery = DB::table('fms_g9_taxrates')->get();
     
        $tax = [];
        foreach ($taxQuery as $data) {
           
            $tax[] = [
                'taxid'   => $data->tax_rate_id,
                'taxname' => $data->tax_rate_name,
                'description' => $data->description,
                'percent' => $data->rate_percentage.'%',
            ];
            
        }

        return response()->json($tax);

}

public function addroledatas(Request $request){
    
    try {
        $var = (object) $request;
        // dd($var->rid);
        $exist = DB::table('fms_g9_tbluserdescrip')->where('usertype', $var->rid)->exists();

        if($exist){

            $response = 'Role ID already exists!';

        } else {
            DB::table('fms_g9_tbluserdescrip')->insert([
                'usertype' => $var->rid,
                'userdesc' => $var->rname,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            $response = 'Role has been successfully added!';
        }

    } catch (\Exception $e) {

        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

    return response()->json(['message' => $response]);


}

public function getAssetInventory(Request $request){
    
    try {
  
        $requestData = (object) $request;

        $inventoryQuery = DB::table('fms_g9_asset_inventory');
       
        // if ($requestData->roleSelector != "") {
        //     $usersQuery = $usersQuery->where('usertype', '=', $requestData->roleSelector);
        // }

        $inventoryQuery = $inventoryQuery->get();
     
        // dd($usersQuery);
        $formattedPromotions = [];
        foreach ($inventoryQuery as $data) {
           
            $formattedPromotions[] = [
                'asset_name' => $data->asset_name ?: 'N/A',
                'description' => $data->description,
                'category' => $data->category,
                'purchase_cost' => '₱'.$data->purchase_cost,
                'current_value' =>  '₱'.$data->current_value,
                'status' => $data->status,
                'depreciation_method' => $data->depreciation_method,
                'depreciation_rate' => $data->depreciation_rate.' %'
            ];
        }
        // dd($formattedPromotions);
        return response()->json($formattedPromotions);

        

    } catch (\Exception $e) {
 
        return response()->json(['error' => 'An error occurred while processing the request.'], 500);

    }

}

public function userdesc($usertype){

    $sql = DB::table('fms_g9_tbluserdescrip')
        ->select('userdesc')
        ->where('usertype',$usertype)
        ->first();
        

    return $sql->userdesc;


}

public function reportidx(Request $request){
    // dd($request->all());
    $requestData = (object) $request;

    // dd($requestData);
    switch ($requestData['sjob']){
        case 'assetstatus':
            return $this->assetstatus();
            break;
        case 'assetlocations':
            return $this->assetlocations();
            break;
        case 'assetdetails':
            return $this->assetDetails();
            break;    
        case 'assettransaction':
            return $this->assetTransaction();
            break; 
        case 'assetmaintenance':
            return $this->assetMaintenance();
            break; 
        case 'assetdepreciation':
            return $this->assetDepreciation();
            break; 
        case 'Depreciation':
            return $this->depreciationCalcu();
            break; 
        

            

    }
}

private function assetstatus(){

    $users = DB::table('fms_g9_asset_status')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.user_report',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}

private function assetlocations(){

    $users = DB::table('fms_g9_asset_location')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.locationreport',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}

private function assetDetails(){

    $users = DB::table('fms_g9_asset_detail')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.detailsreport',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}

private function assetTransaction(){

    $users = DB::table('fms_g9_financial_transaction')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.transactionreport',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}


private function assetMaintenance(){

    $users = DB::table('fms_g9_asset_maintenance')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.maintenancereport',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}

private function assetDepreciation(){

    $users = DB::table('fms_g9_asset_empdepreciation')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.depreciationreport',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}

private function depreciationCalcu(){

    $users = DB::table('fms_g9_assets')->get(); 

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $html = view('reports.depreciationcalcureport',compact('users'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();

    // Generate the PDF content as a string
    $pdfContent = $dompdf->output();

    // Set the appropriate headers for PDF download
    $response = Response::make($pdfContent, 200);
    $response->header('Content-Type', 'application/pdf');
    $response->header('Content-Disposition', 'inline; filename="document.pdf"');

    return $response;

}





}
