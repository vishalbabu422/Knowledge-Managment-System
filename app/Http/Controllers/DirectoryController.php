<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentCatalogue;

class DirectoryController extends Controller
{
    public function index()
    {
        $catalogues = ContentCatalogue::where('is_deleted', false)->get();
        return view('directory.index', compact('catalogues'));
    }
}
