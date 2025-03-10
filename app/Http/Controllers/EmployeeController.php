<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class EmployeeController extends Controller
{
    // Afficher le tableau de bord des employés
    public function dashboard()
    {
        $files = File::where('employee_id', auth()->id())->get();
        return view('dashboard', compact('files'));
    }
}