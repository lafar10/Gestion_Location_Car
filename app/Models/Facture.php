<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'fullname_a',
        'adress',
        'adress_a',
        'phone',
        'car_marque',
        'date_contract_debut',
        'date_contract_fin',
        'price',
        'oil_size',
        'passport_id',
        'etat',
        'created_at'
    ];
}
