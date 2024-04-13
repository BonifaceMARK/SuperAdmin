<?php

namespace App\Http\Controllers;
use App\Models\PaymentGateway;
use App\Models\FreightPayment;
use Illuminate\Http\Request;
use App\Models\AdminPayment;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class fms5Controller extends Controller
{

    public function fms5payment()
    {


       return view ('F5.payment');
    }

    public function fms5communication()
    {


       return view ('F5.c&c');
    }

    public function fms5standards()
    {


       return view ('F5.standards');
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
            // Add validation rules for other fields if needed
        ]);

        // Create a new PaymentGateway instance and store in the database
        PaymentGateway::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment created successfully');
    }
    public function storeAdmin(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'paymentType' => 'required|string',
            'amount' => 'required|numeric',
            'paymentDate' => 'required|date',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        // Create a new AdminPayment instance and store it in the database
        AdminPayment::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Admin payment created successfully');
    }
    public function storeFreight(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'freightService' => 'required|string',
            'freightAmount' => 'required|numeric',
            'freightDate' => 'required|date',
            'freightDescription' => 'nullable|string',
            'freightStatus' => 'required|string',
            // Add validation rules for other fields if needed
        ]);

        // Create a new FreightPayment instance and store it in the database
        FreightPayment::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Freight payment created successfully');
    }
    public function index()
    {
        // Fetch the last 10 messages with the associated user
        $messages = ChatMessage::latest()->with('user')->limit(10)->get();

        // Return the authenticated user's name and department
        $user = Auth::user();
        $name = $user->name;


        return view('F5.c&c', compact('messages', 'name',));
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        // Create a new message instance
        $message = new ChatMessage();
        $message->message = $request->input('message');

        // Associate the message with the authenticated user
        $message->user_id = Auth::id();

        // Save the message
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
    public function fetch()
    {
        // Fetch the latest chat messages
        $messages = ChatMessage::latest()->limit(10)->pluck('message');

        return response()->json($messages, 200);
    }

}
