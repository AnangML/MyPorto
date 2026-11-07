<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\Skill;
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
            ->featured()
            ->with(['categories', 'technologies'])
            ->orderBy('sort_order', 'asc')
            ->get();

        $skills = Skill::query()
            ->visible()
            ->get()
            ->groupBy('category');

        $experiences = Experience::query()
            ->visible()
            ->get();

        return view('home', compact('profile', 'projects', 'skills', 'experiences'));
    }
}
