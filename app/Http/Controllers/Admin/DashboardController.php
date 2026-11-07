<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\ProfileSetting;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin overview dashboard with system metrics.
     */
    public function index(): View
    {
        $stats = [
            'total_projects' => Project::count(),
            'published_projects' => Project::where('status', 'published')->count(),
            'featured_projects' => Project::where('is_featured', true)->count(),
            'total_skills' => Skill::count(),
            'total_experiences' => Experience::count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::unread()->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();
        $profile = ProfileSetting::current();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects', 'profile'));
    }
}
