<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MaterialFile;
use Illuminate\Http\Request;

class MaterialFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:jpg,png,pdf|max:204800',
            'material_id' => 'required|exists:register_of_materials,id'
        ]);

        $uploadedFiles = [];

        foreach ($request->file('files') as $key => $file) {
            $path = $file->store('material_files', 'public');

            $uploadedFiles[] = MaterialFile::create([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'type' => $key === 0 ? 'main' : 'additional',
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'register_of_materials_id' => $request->material_id
            ]);
        }

        return response()->json($uploadedFiles);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
