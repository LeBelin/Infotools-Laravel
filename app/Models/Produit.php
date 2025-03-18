<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable =[
        'nomProduit', 'descriptionProduit', 'prixUnitaire', 'dateAjoutProduit', 'imgProduit'
        ];

    protected $table = 'produit'; // Nom correct de la table
}
