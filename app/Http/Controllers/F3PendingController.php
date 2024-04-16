<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendingdocu;
use App\Models\Message;
class F3PendingController extends Controller
{
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


}
