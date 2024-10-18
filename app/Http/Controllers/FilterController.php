<?php

use App\Models\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getFiltersByCategory(Request $request)
    {
        // $category = $request->input('category');
        // $filter = Filter::where('category', $category)->first();

        // return response()->json($filter ? json_decode($filter->filters) : []);

        $category = $request->get('category');
        $filter = Filter::where('category', $category)->first();

        if ($filter) {
            return response()->json(json_decode($filter->filters));
        }

        return response()->json([]);
    }
}
