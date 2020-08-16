<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class commentaire extends Model
{
    protected $fillable=['produit','compte','email','commentaire','etoile'];
}
