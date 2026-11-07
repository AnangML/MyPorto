<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the portfolio owner profile settings.
     */
    public function edit(): View
    {
        $profile = ProfileSetting::current() ?? new ProfileSetting([
            'display_name' => 'Anang Muhamad Lutfi',
            'availability_status' => true,
        ]);

        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the portfolio owner profile settings in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'headline_id' => ['required', 'string', 'max:255'],
            'headline_en' => ['required', 'string', 'max:255'],
            'bio_id' => ['required', 'string'],
            'bio_en' => ['required', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'email_public' => ['nullable', 'email', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'availability_status' => ['nullable', 'boolean'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_profile_photo' => ['nullable', 'boolean'],
            'cv_file' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ]);

        $profile = ProfileSetting::firstOrNew(['id' => 1]);

        $validated['availability_status'] = $request->boolean('availability_status');

        // Handle profile photo removal
        if ($request->boolean('remove_profile_photo')) {
            if ($profile->profile_photo_path && Storage::disk('public')->exists($profile->profile_photo_path)) {
                Storage::disk('public')->delete($profile->profile_photo_path);
            }
            $validated['profile_photo_path'] = null;
        }
        unset($validated['remove_profile_photo']);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo_path && Storage::disk('public')->exists($profile->profile_photo_path)) {
                Storage::disk('public')->delete($profile->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile', 'public');
            $validated['profile_photo_path'] = $path;
        }
        unset($validated['profile_photo']);

        if ($request->hasFile('cv_file')) {
            if ($profile->cv_file_path && Storage::disk('public')->exists($profile->cv_file_path)) {
                Storage::disk('public')->delete($profile->cv_file_path);
            }

            $path = $request->file('cv_file')->store('cv', 'public');
            $validated['cv_file_path'] = $path;
        }

        unset($validated['cv_file']);

        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Pengaturan profil berhasil diperbarui.');
    }
}
