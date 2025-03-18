<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Prospect extends Model
{
    use HasFactory;

    protected $table = 'prospects';

    public function rendezvous(){
        return $this->hasMany('App\Rendezvous');
    }

    protected $fillable =[
        'nomProspect', 'prenomProspect', 'telephoneProspect', 'emailProspect', 'dateCreation','idCommerciaux'
        ];
    
    protected $primaryKey = 'idProspect'; // Si la clé primaire n'est pas `id`
}
