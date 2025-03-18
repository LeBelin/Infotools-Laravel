<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RendezVous extends Model
{
    use HasFactory;

    public function commerciaux(){
        return $this->belongsTo('App\Models\Commerciaux','idCommerciaux');
    }

    public function clients(){
        return $this->belongsTo('App\Models\Client','idClient');
    }

    protected $fillable =[
        'dateRendezVous', 'typeRendezVous', 'descriptionRendezVous', 'heureDebutRendezVous', 'heureFinRendezVous', 'idCommerciaux', 'idProspect', 'idClient','idUsers'
        ];

        protected $table = 'rendezvous'; // Nom correct de la table

        protected $primaryKey = 'idRendezVous'; // Si la clé primaire n'est pas `id`
}
