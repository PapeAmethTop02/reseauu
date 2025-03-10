<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',      // Nom du fichier
        'path',      // Chemin d'accès du fichier
        'employee_id', // ID de l'employé qui a téléversé le fichier
    ];

    /**
     * Relation avec l'employé : un fichier appartient à un employé.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}