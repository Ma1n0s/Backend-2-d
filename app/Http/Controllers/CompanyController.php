<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        $companies = Company::where('is_confirmed', true)->where('name_comp', 'LIKE', "%{$query}%")->get();


        return response()->json($companies);
    }


    public function index(Request $request)
    {

        // sort, category, page + limit, search
        // идея 1 10 юр услуги
        $companies = Company::where('is_confirmed', true)->get();
        return response()->json($companies);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:companies,email',
            'name_comp' => 'required|string|max:255',
            'inn_comp' => 'required|string|max:255',
            'is_confirmed' => 'boolean',
        ]);

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'name_comp' => $request->name_comp,
            'inn_comp' => $request->inn_comp,
            'is_confirmed' => $request->is_confirmed ?? false,
        ]);

        return response()->json($company, 201);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:companies,email',
            'name_comp' => 'required|string|max:255',
            'inn_comp' => 'required|string|max:255',
            'is_confirmed' => 'boolean',
        ]);

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'name_comp' => $request->name_comp,
            'inn_comp' => $request->inn_comp,
            'is_confirmed' => $request->is_confirmed ?? false,
        ]);

        return response()->json(['token' => 'токен'], 201);
    }

}

