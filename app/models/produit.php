<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable=['collection','nom','prix','image','statut','marque'];
}
