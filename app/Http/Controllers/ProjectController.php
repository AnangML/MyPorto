<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    /**
     * Display a single project case study detail.
     */
    public function show(string $slug): View
    {
        $project = Project::query()
            ->published()
            ->where('slug', $slug)
            ->with(['categories', 'technologies'])
            ->firstOrFail();

        // Also fetch up to 2 other published projects as recommendations
        $relatedProjects = Project::query()
            ->published()
            ->where('id', '!=', $project->id)
            ->with(['categories', 'technologies'])
            ->take(2)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
