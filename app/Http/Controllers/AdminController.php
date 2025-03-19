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

    public function blockEmployee($id)
{
    $employee = Employee::findOrFail($id);
    $employee->update(['status' => 'blocked']); // Mettre le statut à "bloqué"
    
    return redirect()->route('admin.employees')->with('status', 'Employé bloqué avec succès');
}

public function unblockEmployee($id)
{
    $employee = Employee::findOrFail($id);
    $employee->update(['status' => 'active']); // Remettre le statut à "actif"
    
    return redirect()->route('admin.employees')->with('status', 'Employé débloqué avec succès');
}


public function deleteEmployee($id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete();

    return redirect()->route('admin.employees')->with('status', 'Employé supprimé avec succès');
}


}