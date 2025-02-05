<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentCatalogue;

class SearchController extends Controller
{
    public function autoComplete(Request $request)
    {
        $query = $request->get('term');

        // Adjust your query as needed, for example, a 'name' column search:
        $results = ContentCatalogue::where('title', 'like', '%' . $query . '%')
            ->take(5) // You can limit the number of results
            ->get();

        return response()->json($results);
    }

    public function basicSearch(Request $request)
    {
        $item = $request->input('item');

        $searchResults = ContentCatalogue::where('title', 'like', '%' . $item . '%')->get();

        $view = view('search.basicsearch', compact('searchResults'))->render();

        return response()->json($view); 
    }
}
