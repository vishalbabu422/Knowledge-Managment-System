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
        $item = $request->input('term'); // Get the search term from the request

        // Perform the search query with pagination
        $searchResults = ContentCatalogue::where('title', 'like', '%' . $item . '%')->paginate(1); // Adjust pagination size

        if ($request->ajax()) {
            // Render the content part (search results) alone
            $view = view('search.basicsearch', compact('searchResults'))->render();

            return response()->json($view);
        }

        // If it's not an AJAX request, return the normal view
        return view('search.basicsearch', compact('searchResults'));
    }
}
