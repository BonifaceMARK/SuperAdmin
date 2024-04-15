<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pendingdocu;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Models\FmsG2CostAllocation;
class F3ClientController extends Controller
{
    function clipage() {
        return view('cliadd');
    }
    public function update(Request $request, $id)
    {
        $item = Pendingdocu::find($id);
        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
        $comment = $request->input('comment');
        $status = $request->input('status');


        $item->update([
            'status' => $status,

        ]);


        Comment::create([
            'pendingdocu_id' => $id,
            'comment' => $comment,
        ]);

        return redirect()->back()->with('success', 'Document status updated successfully.');
    }
    public function show($id)
    {
        $pending = Pendingdocu::findOrFail($id);
        if (!$pending) {
            return redirect()->route('f3.pendingdox')->with('error', 'Pending not found.');
        }
        $users = User::all();
        return view('f3.pendingdox', compact('pending', 'users'));
    }



    public function getStr($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    public function indexp()
    {

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
    return view('f3.dash', compact('pendingdocu', 'pendingdocuCount', 'totalPrice','userCount','users','recentpending'));
    }

    public function indexpage()
    {




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


    return view('f3.pendingdox', compact('pendingdocux', 'pendingdocuCount', 'users'));
    }



























    // report
    function apar() {

        return view('f3.apar');
    }
    public function fetchChartData()
    {
        // Fetch data from ArInvoice endpoint
        $arResponse = Http::get('https://fms7-apar.fguardians-fms.com/api/arinvoice');
        // Fetch data from ApInvoiceList endpoint
        $apResponse = Http::get('https://fms7-apar.fguardians-fms.com/api/apinvoice');

        // Check if both requests were successful
        if ($arResponse->successful() && $apResponse->successful()) {
            // Get the JSON responses and decode them
            $arInvoices = $arResponse->json()['ArInvoice'];
            $apInvoices = $apResponse->json()['ApInvoiceList'];

            // Process AR invoices to group amounts by date
            $arAmountByDate = [];
            foreach ($arInvoices as $invoice) {
                $date = $invoice['date'];
                $amount = floatval($invoice['amount']);

                // If date already exists, add amount to existing total
                if (isset($arAmountByDate[$date])) {
                    $arAmountByDate[$date] += $amount;
                } else {
                    // If date doesn't exist, create a new entry
                    $arAmountByDate[$date] = $amount;
                }
            }

            // Process AP invoices to group amounts by date
            $apAmountByDate = [];
            foreach ($apInvoices as $invoice) {
                $date = $invoice['update_date'];
                $amount = floatval($invoice['amount']);

                // If date already exists, add amount to existing total
                if (isset($apAmountByDate[$date])) {
                    $apAmountByDate[$date] += $amount;
                } else {
                    // If date doesn't exist, create a new entry
                    $apAmountByDate[$date] = $amount;
                }
            }

            // Convert AR data to the format required by the chart
            $arChartData = [];
            foreach ($arAmountByDate as $date => $amount) {
                $arChartData[] = [
                    'x' => $date,
                    'y' => $amount
                ];
            }

            // Convert AP data to the format required by the chart
            $apChartData = [];
            foreach ($apAmountByDate as $date => $amount) {
                $apChartData[] = [
                    'x' => $date,
                    'y' => $amount
                ];
            }
            usort($apChartData, function ($a, $b) {
                return strtotime($a['x']) - strtotime($b['x']);
            });
            usort($arChartData, function ($a, $b) {
                return strtotime($a['x']) - strtotime($b['x']);
            });
            return response()->json(['ar' => $arChartData, 'ap' => $apChartData]);
        } else {
            // Handle unsuccessful requests
            return response()->json(['error' => 'Failed to fetch data from the API'], 500);

        }
    }






    function taxfin() { return view('f3.taxandfin');}function creman() { return view('f3.creditmanagement');}
    private function generateRandomData()
    {

        $total_data = [
            'cash' => 167971,
            'accounts Receivable' => 5100,
            'inventory' => 7805,
            'ppe' => 45500,
            'total Assets' => 226376,
            'accounts Payable' => 3902,
            'debt' => 50000,
            'total Liabilities' => 53902,
            'equity Capital' => 170000,
            'retained Earnings' => 2474,
            'total Equity' => 172474,
            'total Liabilities Equity' => 226376
        ];


        $random_data = [];


        foreach ($total_data as $category => $total_value) {
            if ($category !== 'total Liabilities Equity') {

                $random_value = mt_rand(0, $total_value);
                $random_data[$category] = $random_value;
            }
        }
        $difference = $total_data['total Assets'] + array_sum($random_data);
         $random_data['total Liabilities Equity'] = $difference;
        return $random_data;
    }
    function fixass() {

         $random_data = $this->generateRandomData();





















        return view('f3.fixedasset', compact('random_data'));

    }
    function bank() {
        $data = [];
        $streetNames = ['Main Street','Elm Street','Maple Avenue','Oak Street','Cedar Avenue','Pine Street','Lakeview Drive','Sunset Boulevard','Park Avenue','River Road','Highland Avenue','Greenwood Avenue','Washington Street','Broadway','Church Street','Riverside Drive','Mountain View Road','Valley Road','Spring Street','Hillcrest Avenue','Sunrise Lane','Forest Avenue','Maplewood Drive','Chestnut Street','Meadow Lane','Willow Street','Lincoln Avenue','West Street','Parkway','Sycamore Lane','Fairview Avenue','Crescent Avenue','Orchard Street','Maple Lane','Windsor Avenue','Grove Street','Pearl Street','Harrison Avenue','Magnolia Drive','Oakwood Avenue','Pleasant Street','Linden Street','Holly Drive','Sunset Avenue','Cottage Avenue','Birch Lane','River Street','Meadowview Drive','Lake Street','Forest Drive','Ridge Road','Springfield Avenue','Cedar Street','Willow Lane','Hillside Avenue','Lakeside Drive','Cherry Street','Brookside Drive','Pine Lane','Hickory Lane','Juniper Lane','Maplewood Avenue','Sycamore Street','Beech Street','Pineview Drive','Fairway Drive','Creek Road','Grandview Drive','Hilltop Road','Chestnut Lane','Parkside Avenue','Linden Avenue','Crescent Street','Oak Lane','Willow Drive','Highland Drive','River Lane','Meadow Street','Sunrise Avenue','Forest Lane','Ridge Avenue','Birch Street','Lakeview Avenue','Hillcrest Drive','Brookside Avenue','Sycamore Drive','Cedar Lane','Hickory Street','Maple Street','Pine Avenue','Beech Lane','Cherry Lane','Creek Drive','Grandview Avenue','Pine Road','Fairway Road','Juniper Street','Hillside Drive','Lakeside Avenue','Willow Avenue','Springfield Drive','Parkside Drive','Chestnut Drive','Birch Avenue','Sunrise Drive','Hilltop Drive','Oak Avenue','Crescent Drive','Linden Drive','Highland Street','Forest Road','Ridge Drive','Brookside Road','Lakeview Drive','Maple Lane','Sycamore Road','Meadow Lane','Pine Street','Hillcrest Road','Grandview Road','Sunrise Lane','Willow Lane','Cedar Drive','Hickory Drive','Cherry Drive','Beech Drive','Creek Lane','Hillside Road','Fairway Lane','Juniper Drive','Lakeside Road','Parkside Road','Chestnut Road','Birch Road','Oak Drive','Hilltop Lane','Linden Lane','Highland Drive','Forest Lane','Ridge Lane','Brookside Lane','Maple Road','Sycamore Lane','Meadow Road','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Road','Willow Road','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Road','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane','Chestnut Lane','Birch Lane','Oak Lane','Hilltop Lane','Linden Lane','Highland Lane','Forest Lane','Ridge Lane','Brookside Lane','Maple Lane','Sycamore Lane','Meadow Lane','Pine Lane','Hillcrest Lane','Grandview Lane','Sunrise Lane','Willow Lane','Cedar Lane','Hickory Lane','Cherry Lane','Beech Lane','Creek Lane','Hillside Lane','Fairway Lane','Juniper Lane','Lakeside Lane','Parkside Lane',
        ];
        $countries = [
            'United States',
            'Canada',
            'United Kingdom',
            'Australia',
            'Germany',
            'France',
            'Japan',
            'China',
            'Brazil',
            'India',
            'Russia',
            'Italy',
            'Spain',
            'South Korea',
            'Mexico',
            'Indonesia',
            'Netherlands',
            'Saudi Arabia',
            'Switzerland',
            'Argentina',
            // Add more countries as needed
        ];







    $firstNames = array_map('trim', explode("\n", File::get(storage_path('app/fname.txt'))));
$lastNames = array_map('trim', explode("\n", File::get(storage_path('app/lname.txt'))));

    for ($i = 0; $i < 25; $i++) {
        $firstName = $firstNames[array_rand($firstNames)];
        $lastName = $lastNames[array_rand($lastNames)];
        $symbols = array('@', '#', '$', '%', '&', '*', '+', '-', '_', '~');
        $randomSymbol = $symbols[array_rand($symbols)];
        $randomIndex = rand(0, count($streetNames) - 1);
        $ranx = rand(100, 999);
        $randomStreetName = $streetNames[$randomIndex];
        $randomCountry = $countries[array_rand($countries)];
        $email = strtolower("$firstName$lastName$randomSymbol$ranx@gmail.com");
        $random_number = rand(1, 12);
        if ($random_number >= 1 && $random_number <= 9) {
           $formatted_number = '0' . $random_number;
        } else {
            $formatted_number = $random_number;
        }
        $randomAddress = rand(100, 999) . ' ' . $randomStreetName;
        $data[] = [
            'id' => 1+$i,
            'name' => $firstName . ' ' . $lastName,
            'dob' => date('m/d/Y', mt_rand(1, time())),
            'address' => "$randomAddress,$randomCountry",
            'phone1' => '(' . rand(100, 999) . ') ' . rand(100, 999) . '-' . rand(1000, 9999),
            'phone2' => '(' . rand(100, 999) . ') ' . rand(100, 999) . '-' . rand(1000, 9999),
            'phone3' => '(' . rand(100, 999) . ') ' . rand(100, 999) . '-' . rand(1000, 9999),
            'email' => $email,
            'card' => rand(4, 6).rand(10000,99999).'******'.rand(1000, 9999),
            'routingno' => rand(2, 4).rand(100000000,999999999),
            'accountno' => rand(2, 4).rand(100000000,999999999),
            'monyear' => $formatted_number. '/'.rand(24, 35),

        ];
    }

     return view('f3.bank')->with('data', $data);
}





}
