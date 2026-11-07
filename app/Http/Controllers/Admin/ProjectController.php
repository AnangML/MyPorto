<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of portfolio projects.
     */
    public function index(): View
    {
        $projects = Project::with(['categories', 'technologies'])
            ->orderBy('is_featured', 'desc')
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create(): View
    {
        $categories = ProjectCategory::orderBy('sort_order')->get();
        $technologies = Technology::orderBy('name')->get();

        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:projects,slug'],
            'summary_id' => ['required', 'string', 'max:300'],
            'summary_en' => ['required', 'string', 'max:300'],
            'description_id' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'role_id' => ['nullable', 'string', 'max:255'],
            'role_en' => ['nullable', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'project_url' => ['nullable', 'url', 'max:255'],
            'repository_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:draft,published,archived'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'started_at' => ['nullable', 'date'],
            'completed_at' => ['nullable', 'date'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:project_categories,id'],
            'technologies' => ['nullable', 'array'],
            'technologies.*' => ['exists:technologies,id'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title_en'] ?: $validated['title_id']);
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        $categories = $validated['categories'] ?? [];
        $technologies = $validated['technologies'] ?? [];
        unset($validated['categories'], $validated['technologies']);

        $project = Project::create($validated);

        if (! empty($categories)) {
            $project->categories()->sync($categories);
        }

        if (! empty($technologies)) {
            $project->technologies()->sync($technologies);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proyek "'.$project->title_id.'" berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project): View
    {
        $categories = ProjectCategory::orderBy('sort_order')->get();
        $technologies = Technology::orderBy('name')->get();

        $selectedCategories = $project->categories->pluck('id')->toArray();
        $selectedTechnologies = $project->technologies->pluck('id')->toArray();

        return view('admin.projects.edit', compact('project', 'categories', 'technologies', 'selectedCategories', 'selectedTechnologies'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($project->id)],
            'summary_id' => ['required', 'string', 'max:300'],
            'summary_en' => ['required', 'string', 'max:300'],
            'description_id' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'role_id' => ['nullable', 'string', 'max:255'],
            'role_en' => ['nullable', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'project_url' => ['nullable', 'url', 'max:255'],
            'repository_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:draft,published,archived'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'started_at' => ['nullable', 'date'],
            'completed_at' => ['nullable', 'date'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:project_categories,id'],
            'technologies' => ['nullable', 'array'],
            'technologies.*' => ['exists:technologies,id'],
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($validated['status'] === 'published' && ! $project->published_at) {
            $validated['published_at'] = now();
        }

        $categories = $validated['categories'] ?? [];
        $technologies = $validated['technologies'] ?? [];
        unset($validated['categories'], $validated['technologies']);

        $project->update($validated);

        $project->categories()->sync($categories);
        $project->technologies()->sync($technologies);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek "'.$project->title_id.'" berhasil diperbarui.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $title = $project->title_id;
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Proyek "'.$title.'" berhasil dihapus.');
    }
}
