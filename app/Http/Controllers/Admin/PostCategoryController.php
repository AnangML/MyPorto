<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    /**
     * Store a newly created post category.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name_id' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
        ]);

        $nameId = trim($validated['name_id']);
        $nameEn = ! empty($validated['name_en']) ? trim($validated['name_en']) : $nameId;

        $baseSlug = Str::slug($nameEn ?: $nameId);
        $slug = $baseSlug ?: 'kategori-'.Str::random(5);
        $count = 1;

        while (PostCategory::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $category = PostCategory::create([
            'name_id' => $nameId,
            'name_en' => $nameEn,
            'slug' => $slug,
        ]);

        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'category' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'name_id' => $category->name_id,
                    'name_en' => $category->name_en,
                    'slug' => $category->slug,
                ],
                'message' => 'Kategori "'.$category->name.'" berhasil ditambahkan.',
            ], 201);
        }

        return redirect()->back()->with('success', 'Kategori "'.$category->name.'" berhasil ditambahkan.');
    }

    /**
     * Remove the specified post category.
     */
    public function destroy(Request $request, PostCategory $postCategory): JsonResponse|RedirectResponse
    {
        $name = $postCategory->name;
        $postCategory->posts()->detach();
        $postCategory->delete();

        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Kategori "'.$name.'" berhasil dihapus.',
            ]);
        }

        return redirect()->back()->with('success', 'Kategori "'.$name.'" berhasil dihapus.');
    }
}
