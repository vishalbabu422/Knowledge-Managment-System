<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ContentCatalogue;
use Illuminate\Support\Facades\Storage;

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

                return redirect()->route('directory.index')->with('success', 'File uploaded and data saved successfully!');
            } else {
                session()->flash('error', 'There was an issue with the file upload.');
                return back();
            }
        } else {

            session()->flash('error', 'The uploaded file is not valid.');

            return back();
        }
    }

    public function download($filename)
    {
        $filePath = storage_path('app/public/attachments/' . $filename);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Return the file as a download response
            return response()->download($filePath);
        } else {
            return abort(404); // File not found
        }
    }

    public function deleteFile($id)
    {
        $catalogue = ContentCatalogue::find(base64_decode($id));

        if (!empty($catalogue)) {
            $normalizedPath = trim($catalogue->path, '/');

            if (Storage::disk('public')->exists($normalizedPath)) {
                Storage::disk('public')->delete($catalogue->path);
            }
            $catalogue->delete();

            session()->flash('success', 'File was deleted successfully!');
        } else {
            session()->flash('error', 'File could not be deleted!');
        }

        return back();
    }

    public function edit($id)
    {
        $catalogue = ContentCatalogue::find(base64_decode($id));

        return view('file.edit', compact('catalogue'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100|min:3',
            'description' => 'required|string|max:500|min:3',
            'attachment' => 'file|mimes:txt,pdf,doc,docx|max:20480'
        ], [
            'title.required' => "Please enter a title.",
            'description.required' => "Please enter a description.",
            'attachment.mimes' => 'Only pdf,txt & doc files allowed',
            'attachment.max' => 'The file size must be less than 20MB.',
        ]);

        $catalogue = ContentCatalogue::find(base64_decode($id));

        $updateCatalogueData = $request->except('_token');

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

            if (!empty($catalogue->path)) {
                $normalizedPath = trim($catalogue->path, '/');
                if (Storage::disk('public')->exists($normalizedPath)) {
                    Storage::disk('public')->delete($catalogue->path);
                }
            }

            $file = $request->file('attachment');
            $destinationPath = 'attachments/';

            $fileName = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs($destinationPath, $fileName, 'public');

            if ($path) {

                $updateCatalogueData['path'] = $path;
            } else {
                session()->flash('error', 'There was an issue with the file upload.');
                return back();
            }
        }

        $catalogue->update($updateCatalogueData);
        return redirect()->route('directory.index')->with('success', 'File uploaded and data updated successfully!');
    }
}
