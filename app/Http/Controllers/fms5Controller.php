<?php

namespace App\Http\Controllers;
use App\Models\PaymentGateway;
use App\Models\FreightPayment;
use Illuminate\Http\Request;
use App\Models\AdminPayment;
use App\Models\ChatMessage;
use App\Models\TaxPayment;
use App\Models\FixedAssetPayment;

use Illuminate\Support\Facades\Auth;

class fms5Controller extends Controller
{



    public function fms5index()
    {

     $messages = ChatMessage::latest()->with('user')->limit(10)->get();


        $user = Auth::user();
        $name = $user->name;
        $department = $user->department;
       return view ('F5.index', compact('messages', 'name', 'department'));
    }

  

    public function storeHotel(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'service' => 'required|string',
            'productName' => 'required|string',
            'transactionName' => 'required|string',
            'paymentMethod' => 'nullable|string',
            'cardType' => 'nullable|string',
            'transactionType' => 'required|string',
            'transactionAmount' => 'required|numeric',
            'transactionDate' => 'required|date',
            'description' => 'nullable|string',
            'transactionStatus' => 'required|string',
            'reasonForCancellation' => 'nullable|string',
            'comment' => 'nullable|string',

        ]);


        PaymentGateway::create($validatedData);

        return redirect()->back()->with('success', 'Payment created successfully');
    }
    public function storeAdmin(Request $request)
    {

        $validatedData = $request->validate([
            'paymentType' => 'required|string',
            'amount' => 'required|numeric',
            'paymentDate' => 'required|date',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);


        AdminPayment::create($validatedData);


        return redirect()->back()->with('success', 'Admin payment created successfully');
    }
    public function storeFreight(Request $request)
    {

        $validatedData = $request->validate([
            'freightService' => 'required|string',
            'freightAmount' => 'required|numeric',
            'freightDate' => 'required|date',
            'freightDescription' => 'nullable|string',
            'freightStatus' => 'required|string',

        ]);


        FreightPayment::create($validatedData);


        return redirect()->back()->with('success', 'Freight payment created successfully');
    }
  

    public function storeMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = new ChatMessage();
        $message->message = $request->input('message');

        $message->user_id = Auth::id();

        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
    public function fetch()
    {

        $messages = ChatMessage::latest()->limit(10)->pluck('message');

        return response()->json($messages, 200);
    }
    public function storeTax(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'taxpayer_name' => 'required|string|max:255',
            'tax_type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Create a new tax payment instance
        $taxPayment = new TaxPayment();
        $taxPayment->taxpayer_name = $validatedData['taxpayer_name'];
        $taxPayment->tax_type = $validatedData['tax_type'];
        $taxPayment->amount = $validatedData['amount'];
        $taxPayment->payment_date = $validatedData['payment_date'];
        $taxPayment->payment_method = $validatedData['payment_method'];
        $taxPayment->status = $validatedData['status'];

        // Save the tax payment to the database
        $taxPayment->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Tax payment has been successfully added.');
    }
    public function storeFixedAsset(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'asset_name' => 'required|string|max:255',
            'asset_description' => 'nullable|string',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'payment_reference' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Create a new fixed asset payment instance
        $fixedAssetPayment = FixedAssetPayment::create($validatedData);

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Fixed asset payment has been successfully added.');
    }
}
