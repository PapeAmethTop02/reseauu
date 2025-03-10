<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Employee; // Importez le modèle Employee

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $employee; // Déclarez une propriété publique pour l'employé

    /**
     * Crée une nouvelle instance du message.
     *
     * @param Employee $employee
     * @return void
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee; // Initialisez la propriété avec l'objet Employee
    }

    /**
     * Construit le message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation d\'inscription') // Sujet de l'email
                    ->view('emails.registration_confirmation') // Vue de l'email
                    ->with(['employee' => $this->employee]); // Passez l'objet Employee à la vue
    }
}