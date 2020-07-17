<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageIntervention;

class Image{
    public static function traitement($image, $format, $largeur, $hauteur){

        $img=ImageIntervention::make($image)->encode($format)->resize($largeur,$hauteur, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $name=Str::random().time().'.png';
        $path=storage_path().'/app/public/';
        $img->save($path.$name);
        return $name;
    }
}
