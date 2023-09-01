<?php

namespace App\Traits;

trait DeleteImgTrait{


public function DeleteImg($variable,$fieldname,$directory)
{

    if ($variable->$fieldname) {
        $imagesPath = public_path($directory . $variable->$fieldname);
        if (file_exists($imagesPath)) {
            unlink($imagesPath);
        }
    }
    if ($variable) {
        $variable->delete();
        return response(['status' => true]);
    } else {
        return response(['status' => false]);
    }
}
}
