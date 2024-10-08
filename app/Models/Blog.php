<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog{

    public $title;
    public $slug;
    public $intro;
    public $body;
    public function __construct($title, $slug, $intro, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
    }
    public static function all()
    {
        $files=File::files(resource_path("blogs"));
        return array_map(function($file){
            $obj=YamlFrontMatter::parseFile($file);
            return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body());
        },$files);

        // return array_map(function($file){
        //     return $file->getContents();
        // },$files);

    }

    public static function find($xfile)
     {
        $path=resource_path("blogs/$xfile.html");
        if (!file_exists($path)) {
        return redirect('/');
        }
        return file_get_contents($path);
    }
}
