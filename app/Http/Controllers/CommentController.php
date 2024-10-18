<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'post_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'body' => $request->body,
            'post_id' => $request->post_id,
            'parent_id' => $request->parent_id,
        ]);

        return response()->json($comment, 201);
    }

    public function index($postId)
    {
        $comments = Comment::with('replies')->where('post_id', $postId)->whereNull('parent_id')->get();
        return response()->json($comments);
    }
}
