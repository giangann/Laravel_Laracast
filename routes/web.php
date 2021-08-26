<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Post::find('my-first-post');
    return view('posts');
});

Route::get('posts/{slug}', function ($slug) {
    //find post with slug and pass it intos posts view (through $post enviroment)
    var_dump($slug);
    return view([
        'post' => Post::find($slug)
    ]);
})
    ->where('slug', '[A-z_-]+');

