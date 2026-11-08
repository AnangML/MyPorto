<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of blog articles.
     */
    public function index(): View
    {
        $posts = Post::with('categories')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): View
    {
        $categories = PostCategory::orderBy('name_id')->get();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
            'excerpt_id' => ['nullable', 'string', 'max:500'],
            'excerpt_en' => ['nullable', 'string', 'max:500'],
            'content_id' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,archived'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:post_categories,id'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title_en'] ?: $validated['title_id']);
            $baseSlug = $validated['slug'];
            $count = 1;
            while (Post::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = "{$baseSlug}-{$count}";
                $count++;
            }
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('cover_image')) {
            $validated['cover_image_path'] = $request->file('cover_image')->store('posts', 'public');
        }

        $categories = $validated['categories'] ?? [];
        unset($validated['categories'], $validated['cover_image']);

        $post = Post::create($validated);

        if (! empty($categories)) {
            $post->categories()->sync($categories);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Artikel "'.$post->title_id.'" berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post): View
    {
        $categories = PostCategory::orderBy('name_id')->get();
        $selectedCategories = $post->categories->pluck('id')->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt_id' => ['nullable', 'string', 'max:500'],
            'excerpt_en' => ['nullable', 'string', 'max:500'],
            'content_id' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,archived'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'remove_cover_image' => ['nullable', 'boolean'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:post_categories,id'],
        ]);

        if ($validated['status'] === 'published' && ! $post->published_at) {
            $validated['published_at'] = now();
        }

        // Handle cover removal
        if ($request->boolean('remove_cover_image')) {
            if ($post->cover_image_path && Storage::disk('public')->exists($post->cover_image_path)) {
                Storage::disk('public')->delete($post->cover_image_path);
            }
            $validated['cover_image_path'] = null;
        }

        // Handle new cover upload
        if ($request->hasFile('cover_image')) {
            if ($post->cover_image_path && Storage::disk('public')->exists($post->cover_image_path)) {
                Storage::disk('public')->delete($post->cover_image_path);
            }
            $validated['cover_image_path'] = $request->file('cover_image')->store('posts', 'public');
        }

        $categories = $validated['categories'] ?? [];
        unset($validated['categories'], $validated['cover_image'], $validated['remove_cover_image']);

        $post->update($validated);
        $post->categories()->sync($categories);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel "'.$post->title_id.'" berhasil diperbarui.');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $title = $post->title_id;

        if ($post->cover_image_path && Storage::disk('public')->exists($post->cover_image_path)) {
            Storage::disk('public')->delete($post->cover_image_path);
        }

        $post->categories()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Artikel "'.$title.'" berhasil dihapus.');
    }
}
