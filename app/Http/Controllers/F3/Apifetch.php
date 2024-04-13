<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Pendingdocu;
use App\Models\Comment;
class Apifetch extends Controller
{
    public function pushapi()
    {
        $approved = Pendingdocu::with('comment')->get();
return response()->json($approved);
    }
    public function foradminx()
    {
$approved = Pendingdocu::with('comment')->get();

foreach ($approved as $record) {
    $record->title = Crypt::decryptString($record->title);
    $record->budget = Crypt::decryptString($record->budget);
    $record->description = Crypt::decryptString($record->description);
    $record->submitted_by = Crypt::decryptString($record->submitted_by);
}

return response()->json($approved);

    }
}
