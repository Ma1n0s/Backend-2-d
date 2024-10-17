<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Comment::query();

        if ($request->has('filter')) {
            $query->where('content', 'like', '%' . $request->filter . '%');
        }

        return response()->json($query->with('user')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'user_id' => $request->user()->id,
            'content' => $request->content,
        ]);

        return response()->json($comment);
    }
}
