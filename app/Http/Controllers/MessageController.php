<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $message = $forum->messages()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'user_name' => $message->user->name,
                'user_photo' => $message->user->photo ? asset('storage/' . $message->user->photo) : asset('default-avatar.png'),
                'content' => e($message->content),
                'time' => $message->created_at->format('H:i'),
            ],
        ]);
    }
}
