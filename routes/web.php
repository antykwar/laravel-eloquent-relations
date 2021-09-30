<?php

use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
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

Route::get('/users', function () {
    $users = User::whereHas('posts')->with('address', 'posts')->get();
    return view('users', ['users' => $users]);
});

Route::get('/posts', function () {
    $posts = Post::with('user', 'tags')->get();
    return view('posts', ['posts' => $posts]);
});

Route::get('/tags', function () {
    $tags = Tag::with('posts')->get();
    return view('tags', ['tags' => $tags]);
});

Route::get('/projects', function() {
    $project = Project::find(2);
    return $project->tasks;
});
