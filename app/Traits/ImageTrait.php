<?php

namespace App\Traits;

trait ImageTrait{


public function uploadImage($fieldName, $directory)
{
    if (request()->hasFile($fieldName)) {
        $file =request()->file($fieldName);
        $fileName = time() . '.' . $file->extension();
        $file->move($directory, $fileName, 'public');
        return $fileName;
    }
    return null;
}
}





