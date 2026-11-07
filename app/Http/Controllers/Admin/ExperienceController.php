<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    /**
     * Display a listing of career and educational experiences.
     */
    public function index(): View
    {
        $experiences = Experience::orderBy('is_current', 'desc')
            ->orderBy('started_at', 'desc')
            ->paginate(15);

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new experience record.
     */
    public function create(): View
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created experience record in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'organization' => ['required', 'string', 'max:255'],
            'position_id' => ['required', 'string', 'max:255'],
            'position_en' => ['required', 'string', 'max:255'],
            'description_id' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'max:255'],
            'started_at' => ['required', 'date'],
            'ended_at' => ['nullable', 'date'],
            'is_current' => ['nullable', 'boolean'],
            'is_visible' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_visible'] = $request->boolean('is_visible', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($validated['is_current']) {
            $validated['ended_at'] = null;
        }

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman di "'.$validated['organization'].'" berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified experience record.
     */
    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified experience record in storage.
     */
    public function update(Request $request, Experience $experience): RedirectResponse
    {
        $validated = $request->validate([
            'organization' => ['required', 'string', 'max:255'],
            'position_id' => ['required', 'string', 'max:255'],
            'position_en' => ['required', 'string', 'max:255'],
            'description_id' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'max:255'],
            'started_at' => ['required', 'date'],
            'ended_at' => ['nullable', 'date'],
            'is_current' => ['nullable', 'boolean'],
            'is_visible' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_current'] = $request->boolean('is_current');
        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($validated['is_current']) {
            $validated['ended_at'] = null;
        }

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman di "'.$experience->organization.'" berhasil diperbarui.');
    }

    /**
     * Remove the specified experience record from storage.
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        $organization = $experience->organization;
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman di "'.$organization.'" berhasil dihapus.');
    }
}
