<?php

namespace App\Http\Controllers\F3;
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
    $record->title =$record->title;
    $record->budget =$record->budget;
    $record->description =$record->description;
    $record->submitted_by =$record->submitted_by;
}

return response()->json($approved);

    }
}
