<?php

namespace App\Helpers;

class Flash{

    public static function message($type,$message){
        return \session()->flash($type,$message);
    }
}
