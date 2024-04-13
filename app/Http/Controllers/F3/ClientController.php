<?php

namespace App\Http\Controllers\F3;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pendingdocu;
use App\Models\Comment;
class ClientController extends Controller
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
            return redirect()->route('pendingdox')->with('error', 'Pending not found.');
        }
        $users = User::all();
        return view('pendingdox', compact('pending', 'users'));
    }
}
