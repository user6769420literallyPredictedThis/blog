<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('images', 'user', 'tags')->withCount('comments')->latest()->simplePaginate(16);

        return view('welcome', compact('posts'));
    }

    public function user(User $user)
    {
        $posts = $user->posts()->with('images', 'user', 'tags')->withCount('comments')->latest()->simplePaginate(16);

        return view('welcome', compact('posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(16);

        return view('welcome', compact('posts'));
    }

    public function buttons()
    {
        return view('buttons');
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }
}
