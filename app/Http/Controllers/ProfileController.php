<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        $companyData = $user->Profile;
        return response()->json($companyData);
    }

    public function index()
    {
        return view("123");
    }

    public function show(Request $request)
    {
        $userId = $request->user()->id;
        $profile = Profile::where('user_id', $userId)->first();
        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile);
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required|integer',
            'OGRN' => 'required|string|max:255',
            'OKPO' => 'required|string|max:255',
            'BIC' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'home' => 'required|string|max:255',
        ]);

        $profile = Profile::create([
            'user_id' => $request->user()->id,
            'OGRN' => $request->input('OGRN'),
            'OKPO' => $request->input('OKPO'),
            'BIC' => $request->input('BIC'),
            'postalCode' => $request->input('postalCode'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'home' => $request->input('home'),
        ]);

        return response()->json($profile, 201);


    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return response()->json(['message' => 'Профиль не найден'], 404);
        }

        $data = $request->validate([
            'OGRN' => 'required|string|max:255',
            'OKPO' => 'required|string|max:255',
            'BIC' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'home' => 'required|string|max:255',
        ]);

        $profile->update($data);

        return response()->json($profile);
    }
}
