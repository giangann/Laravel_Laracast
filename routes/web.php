<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $temp = Post::all();
    arsort($temp);

    ddd($temp); 
    
    // ddd($temp[0]);
    return view('posts',[
        'posts' => $temp //assign an index array for variable $posts
    ]);
});

Route::get('/posts/{post}', function($slug){
    return view('post',[
        'post' => Post::find($slug)
    ]);
});