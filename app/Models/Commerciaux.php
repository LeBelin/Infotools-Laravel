<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Commerciaux extends Model
{
    use HasFactory;

    protected $table = 'commerciaux';

    public function clients(){
        return $this->hasMany('App\Client');
    }

    public function rendezvous(){
        return $this->hasMany('App\Rendezvous');
    }

    public function users(){
        return $this->belongsTo('App\Users');
    }

    protected $fillable =[
        'nomCommerciaux', 'prenomCommerciaux', 'adresseCommerciaux', 'villeCommerciaux', 'cpCommerciaux','mailCommerciaux','telCommerciaux', 'passwordCommerciaux'
        ];
    
    protected $primaryKey = 'idCommerciaux'; // Si la clé primaire n'est pas `id`
}
