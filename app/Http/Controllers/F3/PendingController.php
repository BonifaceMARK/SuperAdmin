<?php

namespace App\Http\Controllers\F3;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendingdocu;
use App\Models\Message;
class PendingController extends Controller
{
    public function getStr($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    public function indexp()
    {
        $curl = curl_init();
        $url = "https://fms2-ecabf.fguardians-fms.com/api/budget-s-app";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
            foreach ($data as $item) {

            $existingItem = Pendingdocu::where('reference', $item['reference'])->exists();
            if ($existingItem) {
                continue;
            }
            $encryptedTitle = $item['title'];
            $encryptedDescription = $item['description'];
            $encryptedAmount = $item['amount'];
            $encryptedName = $item['name'];
            Pendingdocu::create([
                'reference' => $item['reference'],
                'title' => $encryptedTitle,
                'description' => $encryptedDescription,
                'budget' => $encryptedAmount,
                'submitted_by' => $encryptedName,
                'created_at'=>$item['created_at'],
            ]);
        }
        $curl = curl_init();
        $url = "https://fms5-iasipgcc.fguardians-fms.com/payment";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
            foreach ($data as $item) {

            $existingItem = Pendingdocu::where('reference', $item['reference'])->exists();
            if ($existingItem) {
                continue;
            }
            $encryptedTitle = $item['productName'];
            $encryptedDescription = $item['description'];
            $encryptedAmount = $item['transactionAmount'];
            $encryptedName = $item['transactionName'];
            Pendingdocu::create([
                'reference' => $item['reference'],
                'title' => $encryptedTitle,
                'description' => $encryptedDescription,
                'budget' => $encryptedAmount,
                'submitted_by' => $encryptedName,
                'created_at'=>$item['created_at'],
            ]);
        }

    $recentpending = Pendingdocu::latest()->take(5)->get()->map(function ($item) {
        $item->title = $item->title;
        $item->description = $item->description;
        return $item;
    });

    $userCount = User::count();
    $users = User::all();
    $pendingdocuCount = Pendingdocu::count();
    $pendingdocu = Pendingdocu::where('status', 'pending')->get()->map(function ($item) {
        $item->title = $item->title;
        $item->description = $item->description;
        $item->budget = $item->budget;
        return $item;
    });
    $pendingDocs = Pendingdocu::all();
    $totalPrice = 0;
    foreach ($pendingDocs as $pendingDoc) {
        $decryptedBudget = $pendingDoc->budget;
        $totalPrice += (float) $decryptedBudget;
    }
    return view('dash', compact('pendingdocu', 'pendingdocuCount', 'totalPrice','userCount','users','recentpending'));
    }

    public function indexpage()
    {
        // $curl = curl_init();
        // $url = "https://fms2-ecabf.fguardians-fms.com/api/budget-s-app";
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($curl);
        // curl_close($curl);
        // $data = json_decode($response, true);
        //     foreach ($data as $item) {

        //     $existingItem = Pendingdocu::where('reference', $item['reference'])->exists();
        //     if ($existingItem) {
        //         continue;
        //     }
        //     $encryptedTitle = $item['title']);
        //     $encryptedDescription = $item['description']);
        //     $encryptedAmount = $item['amount']);
        //     $encryptedName = $item['name']);

        //     Pendingdocu::create([
        //         'reference' => $item['reference'],
        //         'title' => $encryptedTitle,
        //         'description' => $encryptedDescription,
        //         'budget' => $encryptedAmount,
        //         'submitted_by' => $encryptedName,
        //         'created_at'=>$item['created_at'],
        //     ]);
        // }
        // $curl = curl_init();
        // $url = "https://fms5-iasipgcc.fguardians-fms.com/payment";
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($curl);
        // curl_close($curl);
        // $data = json_decode($response, true);
        //     foreach ($data as $item) {

        //     $existingItem = Pendingdocu::where('reference', $item['reference'])->exists();
        //     if ($existingItem) {
        //         continue;
        //     }
        //     $encryptedTitle = $item['productName']);
        //     $encryptedDescription = $item['description']);
        //     $encryptedAmount = $item['transactionAmount']);
        //     $encryptedName = $item['transactionName']);
        //     Pendingdocu::create([
        //         'reference' => $item['reference'],
        //         'title' => $encryptedTitle,
        //         'description' => $encryptedDescription,
        //         'budget' => $encryptedAmount,
        //         'submitted_by' => $encryptedName,
        //         'created_at'=>$item['created_at'],
        //     ]);
        // }
        // $curl = curl_init();
        // $url = "https://rkiveadmin.com/admin/api/approved-decrypted-budget";
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($curl);
        // curl_close($curl);
        // $data = json_decode($response, true);
        //     foreach ($data as $item) {

        //     $existingItem = Pendingdocu::where('id', $item['id'])->exists();
        //     if ($existingItem) {
        //         continue;
        //     }
        //     $encryptedTitle = $item['title']);
        //     $encryptedDescription = $item['description']);
        //     $encryptedAmount = $item['amount']);
        //     $encryptedName = $item['name']);

        //     Pendingdocu::create([
        //         'reference' => $item['reference'],
        //         'title' => $encryptedTitle,
        //         'description' => $encryptedDescription,
        //         'budget' => $encryptedAmount,
        //         'submitted_by' => $encryptedName,
        //         'created_at'=>$item['created_at'],
        //     ]);
        // }
$curl = curl_init();

// Define URLs for API endpoints
$urls = [
    "https://fms2-ecabf.fguardians-fms.com/api/budget-s-app",
    "https://fms5-iasipgcc.fguardians-fms.com/payment",
    "https://rkiveadmin.com/admin/api/approved-decrypted-budget"
];
$mergedData = [];

foreach ($urls as $url) {
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    // Check for cURL errors
    if ($response === false) {
        // Handle cURL error
        echo 'cURL error: ' . curl_error($curl);
        continue;
    }
    $data = json_decode($response, true);
    $mergedData = array_merge($mergedData, $data);
}
curl_close($curl);

foreach ($mergedData as $item) {
    $existingItem = Pendingdocu::where('reference', $item['reference'])->exists();
    if ($existingItem) {
        continue;
    }
    $encryptedTitle = $item['title'];
    $encryptedDescription = $item['description'];
    $encryptedAmount = $item['amount'];
    $encryptedName = $item['name'];

    Pendingdocu::create([
        'reference' => $item['reference'],
        'title' => $encryptedTitle,
        'description' => $encryptedDescription,
        'budget' => $encryptedAmount,
        'submitted_by' => $encryptedName,
        'created_at' => $item['created_at'],
    ]);
}
// dd($mergedData);

    $users = User::orderBy('id', 'asc')->get()->map(function ($item) {
        $item->name = $item->name;
        $item->username = $item->username;
        return $item;
    });
    $userCount = User::count();
    $pendingdocuCount = Pendingdocu::count();
    $rejectedDocuments = Pendingdocu::where('status', 'rejected')->get();
    foreach ($rejectedDocuments as $document) {
        $document->admin_status = 'rejected';
        $document->save();
    }
    $pendingdocux = Pendingdocu::orderBy('id', 'asc')->get()->map(function ($item) {
        $item->title = $item->title;
        $item->description = $item->description;
        $item->budget = $item->budget;
        return $item;
    });


    return view('pendingdox', compact('pendingdocux', 'pendingdocuCount', 'users'));
    }
    public function pendingmes(Request $request)
    {
    $messages = Message::all();
    $decryptedMessages = [];
    foreach ($messages as $message) {
        $decryptedMessage = $message->message;
        $decryptedMessages[] = [
            'user_name' => $message->user_name,
            'message' => $decryptedMessage,
        ];
    }
    return view('pendingdox', ['messages' => $decryptedMessages]);
    }

}
