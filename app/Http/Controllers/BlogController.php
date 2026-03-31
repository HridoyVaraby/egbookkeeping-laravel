<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->where('is_published', true)
            ->latest()
            ->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $related_posts = Post::with('category')->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('post', 'related_posts'));
    }
}
