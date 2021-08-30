<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
class Post
{
    
    public static function all() {
        $file =  File::files(resource_path('posts'));
        return array_map(fn($file) => $file->getContents(),$file);
    }
    public static function find($slug){
        //check exits, declare variable:
            if (!file_exists($path = resource_path('posts/{$slug}.html'))){
                    throw new ModelNotFoundException();
            }
        //fetch cache (remember) and return
        return cache()->remember('posts.{$slug}',5,fn() => file_get_contents($path));
    }
}
