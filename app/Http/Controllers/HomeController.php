<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use App\Models\Training;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Render the dynamic portfolio homepage.
     */
    public function index(): View
    {
        $profile = ProfileSetting::current();

        $projects = Project::query()
            ->published()
            ->with(['categories', 'technologies'])
            ->orderByDesc('is_featured')
            ->orderBy('sort_order', 'asc')
            ->orderByDesc('published_at')
            ->get();

        $skills = Skill::query()
            ->visible()
            ->get()
            ->groupBy('category');

        $experiences = Experience::query()
            ->visible()
            ->get();

        $trainings = Training::query()
            ->visible()
            ->ordered()
            ->get();

        $categories = ProjectCategory::orderBy('sort_order', 'asc')->get();

        $posts = Post::query()
            ->published()
            ->with('categories')
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('home', compact('profile', 'categories', 'projects', 'skills', 'experiences', 'trainings', 'posts'));
    }
}
