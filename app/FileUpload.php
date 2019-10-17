<?php

namespace App;

use File;
use Illuminate\Support\Facades\Storage;

class FileUpload
{
    public static function passport($request, $fileName, $default = "")
    {
        $name = "";
        $passport = $request->passport;

        if($request)
        {
            $extension = substr(strrchr($passport,'.'),1);
            $name = rand(11111, 99999) . "." . date('Y-m-d') . "." . time() . "." . $extension;
            Storage::disk('photo')->put($name, $passport);

        } else {
            $name = $default;
        }

        return $name;
    }
}
