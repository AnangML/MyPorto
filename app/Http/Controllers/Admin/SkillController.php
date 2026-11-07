<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    /**
     * Display a listing of technical skills.
     */
    public function index(): View
    {
        $skills = Skill::orderBy('category')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create(): View
    {
        $categories = [
            'backend' => 'Backend & Architecture',
            'database' => 'Databases & Storage',
            'frontend' => 'Frontend & Styling',
            'tools' => 'DevOps & Tools',
            'other' => 'Other / Miscellaneous',
        ];

        return view('admin.skills.create', compact('categories'));
    }

    /**
     * Store a newly created skill in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:backend,database,frontend,tools,other'],
            'description_id' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string', 'max:255'],
            'proficiency_label_id' => ['nullable', 'string', 'max:255'],
            'proficiency_label_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill "'.$validated['name'].'" berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill): View
    {
        $categories = [
            'backend' => 'Backend & Architecture',
            'database' => 'Databases & Storage',
            'frontend' => 'Frontend & Styling',
            'tools' => 'DevOps & Tools',
            'other' => 'Other / Miscellaneous',
        ];

        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:backend,database,frontend,tools,other'],
            'description_id' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string', 'max:255'],
            'proficiency_label_id' => ['nullable', 'string', 'max:255'],
            'proficiency_label_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill "'.$skill->name.'" berhasil diperbarui.');
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill): RedirectResponse
    {
        $name = $skill->name;
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill "'.$name.'" berhasil dihapus.');
    }
}
