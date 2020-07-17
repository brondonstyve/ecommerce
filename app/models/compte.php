<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as basicAuth;

class compte extends Model implements Authenticatable
{
    use basicAuth;
    protected $fillable=['nom','email','password','type'];
}
