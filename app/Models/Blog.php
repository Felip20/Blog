<?php

namespace App\Models;

class Blog{

    public static function find($xfile)
     {
        $path=resource_path("blogs/$xfile.html");
        if (!file_exists($path)) {
        return redirect('/');
        }
        return file_get_contents($path);
    }
}
