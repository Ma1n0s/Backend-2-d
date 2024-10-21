<?php

namespace AppHttpControllers;

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comment = Comment::where('company_id', true)->get();
        return response()->json($comment);
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'company_id'  => 'required|integer',
        ]);

        // $existingComment = Comment::where('name', $request->name)->first();
        // if ($existingComment) {
        //     return response()->json(['message' => 'Вы уже оставили комментарий.'], 400);
        // }

        $comment = Comment::create($data);

        return response()->json(['message' => 'Комментарий успешно добавлен!', 'comment' => $comment], 201);
    }

    
}

