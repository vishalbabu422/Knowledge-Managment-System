<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ContentCatalogue;

class FileController extends Controller
{
    public function index(): View
    {
        return view('file.index');
    }

    public function addFile(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100|min:3',
            'description' => 'required|string|max:500|min:3',
            'attachment' => 'required|file|mimes:txt,pdf,doc,docx|max:20480'
        ], [
            'title.required' => "Please enter a title.",
            'description.required' => "Please enter a description.",
            'attachment.required' => "Please upload a file.",
            'attachment.mimes' => 'Only pdf,txt & doc files allowed',
            'attachment.max' => 'The file size must be less than 20MB.',
        ]);


        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $destinationPath = 'attachments/';

            $fileName = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs($destinationPath, $fileName, 'public');

            if ($path) {
                $catalogueData = $request->except('_token');
                $catalogueData['path'] = $path;

                ContentCatalogue::create($catalogueData);

                session()->flash('success', 'File uploaded and data saved successfully!');
            } else {
                session()->flash('error', 'There was an issue with the file upload.');
            }


            return back();
        } else {

            session()->flash('error', 'The uploaded file is not valid.');

            return back();
        }
    }
}
