<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display the specified blog post / article.
     */
    public function show(string $slug): View
    {
        $post = Post::published()
            ->where('slug', $slug)
            ->with('categories')
            ->firstOrFail();

        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->with('categories')
            ->latest('published_at')
            ->take(2)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
