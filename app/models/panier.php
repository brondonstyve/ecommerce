<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    protected $fillable=['produit','compte','quantite','couleur','taille'];
}
