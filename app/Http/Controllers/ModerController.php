<?php

namespace App\Http\Controllers;

use App\Models\ModerOrganization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModerController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->validate([
            'inn_comp' => 'required|string|max:255',
            'OGRN' => 'required|string|max:255',
            'OKPO' => 'required|string|max:255',
            'BIC' => 'required|string|max:255',
            'home' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'site' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
            'file' => 'required|file|max:2048',
            // 'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'public'); // Сохранение в папку storage/app/public/uploads
        }


        $Moder = ModerOrganization::create($data);


        return response()->json($Moder, 201);


    }
}
