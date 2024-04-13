<?php

namespace App\Http\Controllers\F3;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Support\Str;
class ChatController extends Controller
{
    function chatz() {
        return view('chat.chat');
    }
    public function store(Request $request)
    {
    $user = Auth::user();
    $messageText = $request->input('message');
    $chatUniqueId = Str::random(10);
    $chat = Chat::create(['id' => $chatUniqueId]);

    $encryptedMessage = Crypt::encryptString($messageText);

    $message = new Message([
        'chat_id' => $chatUniqueId,
        'user_name' => $user->name,
        'message' => $encryptedMessage
    ]);

    $chat->messages()->save($message);

    return response()->json(['message' => 'Message sent successfully'], 200);
    }
    public function show(Request $request)
    {
    $messages = Message::all();
    $decryptedMessages = [];
    foreach ($messages as $message) {
        $decryptedMessage = Crypt::decryptString($message->message);
        $decryptedMessages[] = [
            'user_name' => $message->user_name,
            'message' => $decryptedMessage,
        ];
    }
    return view('chat.chat', ['messages' => $decryptedMessages]);
    }
    public function pendingmes(Request $request)
    {
    $messages = Message::all();
    $decryptedMessages = [];
    foreach ($messages as $message) {
        $decryptedMessage = Crypt::decryptString($message->message);
        $decryptedMessages[] = [
            'user_name' => $message->user_name,
            'message' => $decryptedMessage,
        ];
    }
    return view('pendingdox', ['messages' => $decryptedMessages]);
    }
}
