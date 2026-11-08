<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Store a newly created technology.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:technologies,name'],
        ]);

        $name = trim($validated['name']);
        $baseSlug = Str::slug($name);
        $slug = $baseSlug ?: 'tech-'.Str::random(5);
        $count = 1;

        while (Technology::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $tech = Technology::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'technology' => [
                    'id' => $tech->id,
                    'name' => $tech->name,
                    'slug' => $tech->slug,
                ],
                'message' => 'Teknologi "'.$tech->name.'" berhasil ditambahkan.',
            ], 201);
        }

        return redirect()->back()->with('success', 'Teknologi "'.$tech->name.'" berhasil ditambahkan.');
    }

    /**
     * Delete the specified technology.
     */
    public function destroy(Request $request, Technology $technology): JsonResponse|RedirectResponse
    {
        $name = $technology->name;
        $technology->projects()->detach();
        $technology->delete();

        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Teknologi "'.$name.'" berhasil dihapus.',
            ]);
        }

        return redirect()->back()->with('success', 'Teknologi "'.$name.'" berhasil dihapus.');
    }
}
