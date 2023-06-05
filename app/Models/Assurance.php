<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'marque',
        'model',
        'year',
        'color',
        'immatriculation',
        'date_assurance_debut',
        'date_assurance_fin',
        'price',
        'period',
        'type_assurance',
        'etat',
        'created_at'
    ];
}
