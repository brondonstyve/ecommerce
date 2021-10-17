<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class commande extends Model
{
    use Notifiable;
    protected $fillable=['codeCom','montant_total','compte','produit','quantite','nom','prenom','email','telephone','adresse','ville','pays','note','typePaiement','montant','devise','status'];
}
