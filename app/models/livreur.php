<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class livreur extends Model
{
    protected $fillable=['compte','localisation','paye','cni'];
}
