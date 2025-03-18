<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    public function produits(){
        return $this->hasMany('App\Produit','idProduit');
    }

    public function clients(){
        return $this->belongsTo('App\Models\Client','idClient');
    }
     protected $fillable =[
        'dateFacture', 'montantTotal', 'statutFacture', 'datePaiement', 'numProduit','idClient'
        ];
    

}
