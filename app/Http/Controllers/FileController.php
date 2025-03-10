<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // Afficher la liste des fichiers
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    // Téléverser un fichier
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $path = $request->file('file')->store('public/files');
        $file = new File([
            'name' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'employee_id' => auth()->id(),
        ]);
        $file->save();

        return redirect()->route('files.index')->with('success', 'Fichier téléversé avec succès.');
    }

    // Afficher un fichier
    public function show(File $file)
    {
        return Storage::download($file->path, $file->name);
    }
}