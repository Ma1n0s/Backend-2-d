<?php

namespace AppHttpControllers;

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($company_id)
    {
        return Comment::where('company_id', $company_id)->get();
        // return response()->json($comments);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'company_id' => 'required|integer',
        ]);



        $comment = Comment::create($data);

        return response()->json(['message' => 'Комментарий успешно добавлен!', 'comment' => $comment], 201);
    }


}

