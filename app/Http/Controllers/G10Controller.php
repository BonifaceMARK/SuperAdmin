<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendors;
use App\Models\Role;
use App\Models\User;
use App\Models\Account;
use App\Models\ActivityLog;
use App\Models\Payouts;
use App\Models\Companybudget;
use App\Models\Transactionhistory;
use App\Models\Transferhistory;
use App\Models\Investments;
use App\Models\Transaction;
use App\Models\Vendor;
use App\Models\DepositRequest;
use App\Models\InvestmentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class G10Controller extends Controller
{
    //
    public function dashboard()
    {
        $userCount = User::where('role', '=', 100)->count();

        $investment = DB::table('fms10_investments')->sum(DB::raw('CAST(amount AS DECIMAL(10, 2))'));

        $countBalance = DB::table('fms10_companybudget')->sum(DB::raw('CAST(budget AS DECIMAL(10, 2))'));

        $data = Payouts::whereNotNull('id')->count('id');

        return view('F10.dashboard', compact('countBalance','investment','data','userCount'));
    }

    public function investmentDashboard()
    {
        $user = auth()->user();

        $investment  = Investments::all();
        return view('F10.investment', compact('investment'));
    }

    public function vendorDashboard()
    {
        $user = auth()->user();
        $vendor  = Vendor::all();
        return view('F10.vendor',compact('vendor'));
    }


    public function fetchData()
    {
        // Fetch total investment count grouped by month
        $investmentCountsByMonth = Investments::select(DB::raw('MONTH(investment_date) as month'), DB::raw('COUNT(*) as total'))
            ->whereNotNull('investment_date')
            ->groupBy(DB::raw('MONTH(investment_date)'))
            ->get();

        // Fetch total account count grouped by month
        $accountCountsByMonth = Account::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereNotNull('created_at')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Fetch total payout count grouped by month
        $payoutCountsByMonth = Payouts::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereNotNull('created_at')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        return response()->json([
            'investment' => $investmentCountsByMonth,
            'accounts' => $accountCountsByMonth,
            'payouts' => $payoutCountsByMonth,
        ]); 
    }   
    
    public function Deposit()
    {
        $user = auth()->user();

        $id = $user->id; // Assuming the primary key of the users table is `id`
                
        // Join the `accounts` table with the `users` table using the `user_id` foreign key
        $depositrequest = Payouts::all();
        return view('admin.investments.deposit', compact('user', 'depositrequest' ));
        
    }

    public function approveDeposit($id)
    {
        $user = auth()->user();

        $deposit = depositrequest::findOrFail($id);
        return view('admin.investments.approve', compact('deposit','user'));
    }

    public function approve(Request $request, $id)
    {
        // try {
        //     // Find the deposit request by its ID
        //     $depositRequest = DepositRequest::findOrFail($id);
    
        //     // Check if the deposit request is already approved or canceled
        //     if ($depositRequest->status === '9') {
        //         return redirect()->route('investments.deposit')->with('error', 'Deposit request has already been approved.');
        //     } elseif ($depositRequest->status === '10') {
        //         return redirect()->route('investments.deposit')->with('error', 'Deposit request has already been canceled.');
        //     }
    
        //     // Update the status of the deposit request to approved
        //     $depositRequest->status = '9'; // Assuming '9' represents an approved status
        //     $depositRequest->save();
    
        //     // Retrieve the account associated with the deposit request
        //     $account = Account::updateOrCreate(
        //         ['user_id' => $depositRequest->user_id], // Search criteria
        //         ['user_id' => $depositRequest->user_id, 'balance' => \DB::raw('balance + ' . $depositRequest->amount)] // Data to update or insert
        //     );
    
        //     return redirect()->route('investments.deposit')->with('success', 'Deposit request approved successfully.');
        // } catch (\Exception $e) {
        //     // Handle any exceptions
        //     return redirect()->route('investments.deposit')->with('error', 'An error occurred while processing the deposit request.');
        // }

        $depositRequest = DepositRequest::findOrFail($id);

        // Check if the current status is not '10' (canceled)
        if ($depositRequest->status != '10') {
            // Check if the current status is not '9' (approved)
            if ($depositRequest->status != '9') {
                // Update the status of the investment request to approved
                $depositRequest->status = '9'; // Assuming '9' represents an approved status
                $depositRequest->save();

                // Retrieve the account associated with the investment request
                $account = accounts::where('user_id', $depositRequest->user_id)->first();

                // If account doesn't exist, create a new one
                if (!$account) {
                    $account = new Account();
                    $account->user_id = $depositRequest->user_id;
                    $account->amount = $depositRequest->amount; // Assuming amount is the deposited amount
                    $account->save();
                } else {
                    // Update the account balance
                    $account->amount += $depositRequest->amount; // Assuming amount is the deposited amount
                    $account->save();
                }
            } else {
                // Redirect with an error message if the investment request is already approved
                return redirect()->route('investments.deposit')->with('error', 'Investment request is already approved.');
            }
        } else {
            // Redirect with an error message if the investment request is already cancelled
            return redirect()->route('investments.deposit')->with('error', 'Investment request is already cancelled.');
        }

        return redirect()->route('investments.deposit')->with('success', 'Investment request approved successfully.');

    }
    
    public function cancelDeposit($id)
    {
        $user = auth()->user();

        $canceldeposit = depositrequest::findOrFail($id);
        return view('admin.investments.cancel', compact('canceldeposit','user'));
    }

    public function cancel(Request $request, $id)
    {
        // // Find the deposit request by its ID
        // $depositRequest = DepositRequest::findOrFail($id);
        
        // // Update the status of the deposit request to cancelled
        // $depositRequest->status = 10; // Assuming '10' represents a cancelled status
        // $depositRequest->save();
        
        // // Retrieve the account associated with the deposit request
        // $account = Account::where('user_id', $depositRequest->user_id)->first();
        
        // if (!$account) {
        //     // This should not happen ideally because if a deposit request exists, there should be an associated account
        //     return redirect()->route('investments.deposit')->with('error', 'No account found for the user.');
        // }
        
        // // Check if the account has enough balance to cancel the deposit request
        // if ($account->balance >= $depositRequest->amount) {
        //     // Update the account balance by subtracting the deposited amount
        //     $account->balance -= $depositRequest->amount; // Assuming amount is the deposited amount
        //     $account->save();
        // }   
    
        // return redirect()->route('investments.deposit')->with('success', 'Your Deposit has been Cancelled.');

                // Find the investment request by its ID
                $depositRequest = DepositRequest::findOrFail($id);

                // Check if the current status is '10' (cancelled)
                if ($depositRequest->status == 10) {
                    // Redirect with an error message if the investment request is already cancelled
                    return redirect()->route('investments.deposit')->with('error', 'Investment request is already cancelled.');
                }
        
                // Check if the current status is '9' (approved)
                if ($depositRequest->status == 9) {
                    // Redirect with an error message if the investment request is already approved
                    return redirect()->route('investments.deposit')->with('error', 'Investment request is already approved.');
                }
        
                // Update the status of the investment request to cancelled
                $depositRequest->status = 10; // Assuming '10' represents a cancelled status
                $depositRequest->save();
        
                // Retrieve the account associated with the investment request
                $account = Account::where('user_id', $depositRequest->user_id)->first();
        
                if (!$account) {
                    // This should not happen ideally because if an investment request exists, there should be an associated account
                    return redirect()->route('investments.deposit')->with('error', 'No account found for the user.');
                }
        
                // Check if the account has enough balance to refund the investment amount
                if ($account->amount >= $depositRequest->amount) {
                    // Refund the investment amount to the user's account
                    $account->amount -= $depositRequest->amount;
                    $account->save();
                } else {
                    // In this case, the user doesn't have enough balance to refund the full amount
                    // You may want to handle this scenario differently, such as notifying the user or contacting support
                    return redirect()->route('investments.deposit')->with('error', 'Insufficient balance to cancel the investment.');
                }
        
                return redirect()->route('investments.deposit')->with('success', 'Your investment has been cancelled and the amount has been refunded to your account.');
    }
    
    public function InvestmentApprove($id)
    {
        $user = auth()->user();

        $invest = InvestmentRequest::findOrFail($id);
        return view('admin.investments.approveinvestment', compact('invest','user'));
    }

    public function InvestApprove(Request $request, $id)
    {
        
        // // Find the deposit request by its ID
        // $InvestmentRequest = InvestmentRequest::findOrFail($id);
        
        // // Check if the deposit request is not already approved
        // if ($InvestmentRequest->status !== '9') { // Assuming '9' represents an approved status
        //     // Update the status of the deposit request to approved
        //     $InvestmentRequest->status = '9'; // Assuming '9' represents an approved status
        //     $InvestmentRequest->save();
            
        //     // Retrieve the account associated with the deposit request
        //     $investment = investments::where('user_id', $InvestmentRequest->user_id)->first();
            
        //     // If account doesn't exist, create a new one
        //     if (!$investment) {
        //         $investment = new investments();
        //         $investment->user_id = $InvestmentRequest->user_id;
        //         $investment->amount = $InvestmentRequest->amount; // Assuming amount is the deposited amount
        //         $investment->investment_date = now(); // Assign the current date as the investment_date
        //         dd($investment);
        //         $investment->save();
        //     } else {
        //         // Update the account balance
        //         $investment->amount += $InvestmentRequest->amount; // Assuming amount is the deposited amount
        //         dd($investment);
        //         $investment->save();
        //     }
            
        //     return redirect()->route('investments.index')->with('success', 'Investment request approved successfully.');
        // } else {
        //     return redirect()->route('investments.index')->with('error', 'Investment request has already been approved.');
        // }

        $investmentRequest = InvestmentRequest::findOrFail($id);

        // Check if the current status is not '10' (canceled)
        if ($investmentRequest->status != '10') {
            // Check if the current status is not '9' (approved)
            if ($investmentRequest->status != '9') {
                // Update the status of the investment request to approved
                $investmentRequest->status = '9'; // Assuming '9' represents an approved status
                $investmentRequest->save();

                // Retrieve the account associated with the investment request
                $investment = investments::where('user_id', $investmentRequest->user_id)->first();

                // If account doesn't exist, create a new one
                if (!$investment) {
                    $investment = new investments();
                    $investment->user_id = $investmentRequest->user_id;
                    $investment->amount = $investmentRequest->amount; // Assuming amount is the deposited amount
                    $investment->investment_date = now(); // Assign the current date as the investment_date
                    $investment->save();
                } else {
                    // Update the account balance
                    $investment->amount += $investmentRequest->amount; // Assuming amount is the deposited amount
                    $investment->save();
                }
            } else {
                // Redirect with an error message if the investment request is already approved
                return redirect()->route('investments.index')->with('error', 'Investment request is already approved.');
            }
        } else {
            // Redirect with an error message if the investment request is already cancelled
            return redirect()->route('investments.index')->with('error', 'Investment request is already cancelled.');
        }

        return redirect()->route('investments.index')->with('success', 'Investment request approved successfully.');


    }

    public function InvestCancel($id)
    {
        $user = auth()->user();

        $invest = InvestmentRequest::findOrFail($id);
        return view('admin.investments.cancelinvestment', compact('invest','user'));
    }

    public function Investmentcancel(Request $request, $id)
    {
        // Find the investment request by its ID
        $investmentRequest = InvestmentRequest::findOrFail($id);

        // Check if the current status is '10' (cancelled)
        if ($investmentRequest->status == 10) {
            // Redirect with an error message if the investment request is already cancelled
            return redirect()->route('investments.index')->with('error', 'Investment request is already cancelled.');
        }

        // Check if the current status is '9' (approved)
        if ($investmentRequest->status == 9) {
            // Redirect with an error message if the investment request is already approved
            return redirect()->route('investments.index')->with('error', 'Investment request is already approved.');
        }

        // Update the status of the investment request to cancelled
        $investmentRequest->status = 10; // Assuming '10' represents a cancelled status
        $investmentRequest->save();

        // Retrieve the account associated with the investment request
        $investment = investments::where('user_id', $investmentRequest->user_id)->first();

        if (!$investment) {
            // This should not happen ideally because if an investment request exists, there should be an associated account
            return redirect()->route('investments.index')->with('error', 'No account found for the user.');
        }

        // Check if the account has enough balance to refund the investment amount
        if ($investment->amount >= $investmentRequest->amount) {
            // Refund the investment amount to the user's account
            $investment->amount -= $investmentRequest->amount;
            $investment->save();
        } else {
            // In this case, the user doesn't have enough balance to refund the full amount
            // You may want to handle this scenario differently, such as notifying the user or contacting support
            return redirect()->route('investments.index')->with('error', 'Insufficient balance to cancel the investment.');
        }

        return redirect()->route('investments.index')->with('success', 'Your investment has been cancelled and the amount has been refunded to your account.');


        // // Find the deposit request by its ID
        // $InvestmentRequest = InvestmentRequest::findOrFail($id);
        
        // // Update the status of the deposit request to cancelled
        // $InvestmentRequest->status = 10; // Assuming '10' represents a cancelled status
        // $InvestmentRequest->save();
        
        // // Retrieve the account associated with the deposit request
        // $investment = investments::where('user_id', $InvestmentRequest->user_id)->first();
        
        // if (!$investment) {
        //     // This should not happen ideally because if a deposit request exists, there should be an associated account
        //     return redirect()->route('investments.index')->with('error', 'No account found for the user.');
        // }
        
        // // Check if the account has enough balance to cancel the deposit request
        // if ($investment->amount >= $InvestmentRequest->amount) {
        //     // Update the account balance by subtracting the deposited amount
        //     $investment->amount -= $InvestmentRequest->amount; // Assuming amount is the deposited amount
        //     $investment->save();
        // }   
    
        // return redirect()->route('investments.index')->with('success', 'Your Investment has been Cancelled.');
    }

    public function Activity()
    {
        $user = auth()->user();
        return view('admin.sidebar.activity_logs', compact('user'));
    }

    public function vendorAdd()
    {

        $user = auth()->user();

        return view('admin.sidebar.vendoradd', compact('user'));
        
    }
    
    public function createVendor(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'role_name' => 'required|in:Vendor,Client',
        ]);
        
        // Retrieve input values from the request
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        $role = $request->input('role_name');
        
        // Get the last inserted user id
        $lastUserId = Vendorsuser::orderBy('id', 'desc')->pluck('id')->first();
        
        // Increment the last user id and pad it with leading zeros
        $user_id = str_pad(++$lastUserId, 6, '0', STR_PAD_LEFT);
        
        // Define the default password
        $defaultPassword = 'userpassword123';
        
        // Create a new Vendorsuser instance
        $newVendor = new Vendorsuser();
        
        // Set the properties of the new Vendorsuser instance
        $newVendor->user_id = $user_id; // Assign the generated user_id
        $newVendor->name = $name;
        $newVendor->email = $email;
        $newVendor->date_of_birth = $date;
        $newVendor->role_name = $role;
        
        // Hash the default password and assign it to the Vendorsuser instance
        $newVendor->password = Hash::make($defaultPassword);
        
        // Save the new Vendorsuser instance to the database
        $newVendor->save();

        // Redirect the user to a success page and provide the default password
        return redirect()->route('vendorAdd')->with('success', 'New Vendor has been Created. Default Password: ' . $defaultPassword);
        
    }

    public function vendorEdit(Request $request, $id){
        // Retrieve the vendor user from the database
        $vendorUser = Vendorsuser::findOrFail($id);
        
        // Update the vendor user with the new data
        $vendorUser->update($request->all());
        
        // Optionally, you can return a response or redirect the user
        return redirect()->route('vendorManage')->with('success', 'Vendor user updated successfully');
    }

    public function viewVendor($id) {
        $user = auth()->user();

        $vendor = Vendor::findOrFail($id);
        return view('F10.components.edit', compact('vendor','user'));
    }
    
    public function updateVendor(Request $request, $id) {
        $vendor = Vendor::findOrFail($id);

        // Update vendor attributes based on form data
        $vendor->full_name = $request->input('name');
        $vendor->company_name = $request->input('company');
        $vendor->address = $request->input('address');
        $vendor->created_at = $request->input('date'); // Assuming 'join_date' is the attribute name

        
        // Update other attributes as needed
        // $vendor->other_attribute = $request->input('other_attribute');
        
        $vendor->save();
        
        return redirect()->route('vendor.dashboard')->with('success', "updated successfully");
        
    }
    
    public function vendorManage(Request $request){

        // Retrieve the authenticated user
        $user = auth()->user();
    
        return view('admin.sidebar.vendormanage', compact('user'));
    }
    
    public function vendorList()
    {
        try {
            // Make an HTTP GET request to the API endpoint
            $response = Http::get('https://fms7-apar.fguardians-fms.com/api/vendor');
    
            // Check if the request was successful (status code 2xx)
            if ($response->successful()) {
                // Decode the JSON response body
                $data = $response->json();
    
                // Extract the vendor data from the response
                $vendors = $data['vendor'];
    
                $user = auth()->user();
    
                // Pass the vendor data to the view
                return view('admin.sidebar.vendorlist', compact('user', 'vendors'));
            } else {
                // Handle the case where the request was not successful
                return response()->json(['error' => 'Failed to retrieve vendor data'], $response->status());
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function vendorView()
    {
        $data = Vendorsuser::whereIn('role_name', ['client', 'vendor'])->get();
        $user = auth()->user();
        return view('admin.sidebar.vendorlist', compact('user', 'data'));
    }

    public function index()
    {
        $user = auth()->user();

        $InvestmentRequest  = Investments::all();

        return view('admin.investments.index', compact('user','InvestmentRequest'));
    }

    public function printReceiptInvestment($id)
    {
        // Fetch the deposit details by ID
        $invest = Investments::findOrFail($id);
    
        // Load the view for printing
        $html = view('F10.inc.printinvest', compact('invest'))->render();
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
    
        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $dompdf->render();
    
        // Output the generated PDF (inline or download)
        return $dompdf->stream('receipt.pdf');
    }

    public function printReceipt($id)
    {
        // Fetch the deposit details by ID
        $deposit = Payouts::findOrFail($id);
    
        // Load the view for printing
        $html = view('F10.inc.print', compact('deposit'))->render();
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
    
        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $dompdf->render();
    
        // Output the generated PDF (inline or download)
        return $dompdf->stream('receipt.pdf');
    }

    public function create()
    {
        $user = auth()->user();
        return view('admin.investments.create', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'amount' => 'required|numeric|min:0|max:10000000',
                'investment_date' => 'required|date',
            ]);
        
            // Create the investment
            $investment = auth()->user()->investments()->create($request->all());
        
            // Redirect to the investment route with success message
            return redirect()->route('investments.index')->with('success', 'Investment created successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating investment: ' . $e->getMessage());
        
            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to create investment. Please try again.');
        }
    }

    public function addVendor()
    {
        $data = vendorInfo::all();
        $user = auth()->user();
        return view('admin.sidebar.addvendor', compact('user', 'data'));
    }
}
