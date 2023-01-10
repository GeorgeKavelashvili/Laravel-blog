<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
use App\Models\User;


Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->with(['category','author'])->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post',[
        'post' => $post
    ]);
});
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
Route::get('authors/{author:username}', function (User $author) {
//    dd($author);
    return view('posts', [
        'posts' => $author->posts
    ]);
});
