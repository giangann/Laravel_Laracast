<?php

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
    return view('posts');
});
Route::get('posts/{smt}', function ($smt) {
   if (!file_exists($path = __DIR__ . "/../resources/posts/{$smt}.html"))
        return redirect('/');

    $post = cache()->remember("post.{$smt}",10, fn()=> file_get_contents($path));

    return view('post',[
        'post' => $post
    ]);
})
->where('smt','[A-z_-]+')
;
