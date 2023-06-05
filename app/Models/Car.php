<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'model',
        'year',
        'color',
        'immatriculation',
        'kilometrage',
        'date_assurance',
        'etat',
        'created_at'
    ];
}
