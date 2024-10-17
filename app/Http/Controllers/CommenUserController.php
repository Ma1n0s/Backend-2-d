<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommenUserController extends Controller
{
    public function store(Request $request){
        
        $user->comments()->create([
            'body' => $request->body,
        ]);
    }
}
