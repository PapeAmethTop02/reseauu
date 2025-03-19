<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    // Afficher le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Traiter l'inscription
    
    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $employee = Employee::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // Envoyer un email de confirmation en passant l'objet $employee
        Mail::to($employee->email)->send(new RegistrationConfirmation($employee));
    
        return redirect('/login')->with('success', 'Votre inscription a été enregistrée. Veuillez vérifier votre email pour confirmer votre inscription.');
    }

    public function showLoginForm()
{
    return view('auth.login'); // Retourne la vue du formulaire de connexion
}

public function login(Request $request)
{
    // Valider les données du formulaire
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tenter de connecter l'utilisateur
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Récupérer l'employé connecté
        $employee = Auth::user();

        // Vérifier si l'employé est bloqué
        if ($employee->status === 'blocked') {
            Auth::logout(); // Déconnecter l'employé
            return back()->withErrors([
                'email' => 'Votre compte a été bloqué, veuillez contacter l\'administrateur.',
            ]);
        }

        // Rediriger l'utilisateur après une connexion réussie
        return redirect()->intended('/dashboard');
    }

    // Retourner en arrière avec une erreur si la connexion échoue
    return back()->withErrors([
        'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
    ]);
}
}