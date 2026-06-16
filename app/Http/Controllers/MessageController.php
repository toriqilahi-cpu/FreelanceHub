<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $userIds = Message::where(
            'sender_id',
            auth()->id()
        )
        ->orWhere(
            'receiver_id',
            auth()->id()
        )
        ->get()
        ->flatMap(function ($message) {

            return [
                $message->sender_id,
                $message->receiver_id
            ];

        })
        ->unique()
        ->filter(function ($id) {

            return $id != auth()->id();

        });

        $users = User::whereIn(
            'id',
            $userIds
        )->get();

        return view(
            'messages.index',
            compact('users')
        );
    }

    public function chat(User $user)
    {
        $messages = Message::where(function ($q) use ($user) {

            $q->where('sender_id', auth()->id())
              ->where('receiver_id', $user->id);

        })->orWhere(function ($q) use ($user) {

            $q->where('sender_id', $user->id)
              ->where('receiver_id', auth()->id());

        })
        ->orderBy('created_at')
        ->get();

        return view(
            'messages.chat',
            compact('user', 'messages')
        );
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        Message::create([

            'sender_id' => auth()->id(),

            'receiver_id' => $request->receiver_id,

            'message' => $request->message

        ]);

        return back();
    }
}
