<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class AdminController extends Controller
{
    // Afficher le tableau de bord de l'administrateur
    public function index()
    {
        return view('admin.dashboard');
    }

    // Afficher la liste des employés
    public function employees()
    {
        $employees = Employee::all();
        return view('admin.employees', compact('employees'));
    }

    // Approuver un employé
    public function approve(Employee $employee)
    {
        $employee->update(['is_approved' => true]);
        return redirect()->route('admin.employees')->with('success', 'Le compte de l\'employé a été approuvé.');
    }
}