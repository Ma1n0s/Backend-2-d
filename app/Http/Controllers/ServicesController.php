<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index($categoryId)
    {
        return Services::where('category_id', $categoryId)->get();
    }
}
