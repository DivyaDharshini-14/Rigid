<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        return $comment->replies()->create([
            'user_id' => Auth::id(),
            'body'    => $request->body,
        ]);
    }

    public function update(Request $request, Reply $reply)
    {
        $this->authorize('update', $reply);

        $request->validate([
            'body' => 'required|string',
        ]);

        $reply->update(['body' => $request->body]);

        return $reply;
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('delete', $reply);
        $reply->delete();

        return response()->json(['message' => 'Reply deleted']);
    }
}
