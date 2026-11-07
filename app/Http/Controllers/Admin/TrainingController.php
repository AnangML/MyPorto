<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Services\IndonesiaRegionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TrainingController extends Controller
{
    /**
     * Display a listing of seminars, trainings, and certifications.
     */
    public function index(Request $request): View
    {
        $query = Training::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title_id', 'like', "%{$search}%")
                    ->orWhere('title_en', 'like', "%{$search}%")
                    ->orWhere('organizer', 'like', "%{$search}%")
                    ->orWhere('vocation', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%")
                    ->orWhere('province', 'like', "%{$search}%");
            });
        }

        if ($subVocation = $request->input('sub_vocation')) {
            $query->where('sub_vocation', $subVocation);
        }

        if ($type = $request->input('type')) {
            $query->where('type', $type);
        }

        $trainings = $query->orderBy('sort_order', 'asc')
            ->orderBy('start_date', 'desc')
            ->paginate(15)
            ->withQueryString();

        $subVocations = Training::SUB_VOCATIONS;
        $types = Training::TYPES;

        return view('admin.trainings.index', compact('trainings', 'subVocations', 'types'));
    }

    /**
     * Show the form for creating a new training or seminar record.
     */
    public function create(): View
    {
        $subVocations = Training::SUB_VOCATIONS;
        $types = Training::TYPES;
        $locationTypes = Training::LOCATION_TYPES;
        $provinces = IndonesiaRegionService::getProvinces();
        $regions = IndonesiaRegionService::getRegions();

        return view('admin.trainings.create', compact('subVocations', 'types', 'locationTypes', 'provinces', 'regions'));
    }

    /**
     * Store a newly created training or seminar record in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'organizer' => ['required', 'string', 'max:255'],
            'vocation' => ['required', 'string', 'max:255'],
            'sub_vocation' => ['required', 'string', Rule::in(array_keys(Training::SUB_VOCATIONS))],
            'type' => ['required', 'string', Rule::in(array_keys(Training::TYPES))],
            'location_type' => ['required', 'string', Rule::in(array_keys(Training::LOCATION_TYPES))],
            'province' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'venue_or_platform' => ['nullable', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'certificate_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp', 'max:5120'],
            'certificate_url' => ['nullable', 'url', 'max:255'],
            'description_id' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'is_visible' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        // If online or international, clear province and city
        if ($validated['location_type'] === 'online') {
            $validated['province'] = null;
            $validated['city'] = null;
        } elseif ($validated['location_type'] === 'international') {
            $validated['province'] = null;
        }

        if ($request->hasFile('certificate_file')) {
            $path = $request->file('certificate_file')->store('trainings/certificates', 'public');
            $validated['certificate_file_path'] = $path;
        }
        unset($validated['certificate_file']);

        $training = Training::create($validated);

        return redirect()->route('admin.trainings.index')->with(
            'success',
            'Data seminar/pelatihan "'.$training->title_id.'" berhasil ditambahkan.'
        );
    }

    /**
     * Show the form for editing the specified training record.
     */
    public function edit(Training $training): View
    {
        $subVocations = Training::SUB_VOCATIONS;
        $types = Training::TYPES;
        $locationTypes = Training::LOCATION_TYPES;
        $provinces = IndonesiaRegionService::getProvinces();
        $regions = IndonesiaRegionService::getRegions();

        return view('admin.trainings.edit', compact(
            'training',
            'subVocations',
            'types',
            'locationTypes',
            'provinces',
            'regions'
        ));
    }

    /**
     * Update the specified training record in storage.
     */
    public function update(Request $request, Training $training): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'organizer' => ['required', 'string', 'max:255'],
            'vocation' => ['required', 'string', 'max:255'],
            'sub_vocation' => ['required', 'string', Rule::in(array_keys(Training::SUB_VOCATIONS))],
            'type' => ['required', 'string', Rule::in(array_keys(Training::TYPES))],
            'location_type' => ['required', 'string', Rule::in(array_keys(Training::LOCATION_TYPES))],
            'province' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'venue_or_platform' => ['nullable', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'certificate_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp', 'max:5120'],
            'certificate_url' => ['nullable', 'url', 'max:255'],
            'remove_certificate_file' => ['nullable', 'boolean'],
            'description_id' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'is_visible' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        // If online or international, clear province and city
        if ($validated['location_type'] === 'online') {
            $validated['province'] = null;
            $validated['city'] = null;
        } elseif ($validated['location_type'] === 'international') {
            $validated['province'] = null;
        }

        // Handle certificate file removal
        if ($request->boolean('remove_certificate_file')) {
            if ($training->certificate_file_path && Storage::disk('public')->exists($training->certificate_file_path)) {
                Storage::disk('public')->delete($training->certificate_file_path);
            }
            $validated['certificate_file_path'] = null;
        }
        unset($validated['remove_certificate_file']);

        // Handle new certificate file upload
        if ($request->hasFile('certificate_file')) {
            if ($training->certificate_file_path && Storage::disk('public')->exists($training->certificate_file_path)) {
                Storage::disk('public')->delete($training->certificate_file_path);
            }

            $path = $request->file('certificate_file')->store('trainings/certificates', 'public');
            $validated['certificate_file_path'] = $path;
        }
        unset($validated['certificate_file']);

        $training->update($validated);

        return redirect()->route('admin.trainings.index')->with(
            'success',
            'Data seminar/pelatihan "'.$training->title_id.'" berhasil diperbarui.'
        );
    }

    /**
     * Remove the specified training record from storage.
     */
    public function destroy(Training $training): RedirectResponse
    {
        if ($training->certificate_file_path && Storage::disk('public')->exists($training->certificate_file_path)) {
            Storage::disk('public')->delete($training->certificate_file_path);
        }

        $title = $training->title_id;
        $training->delete();

        return redirect()->route('admin.trainings.index')->with(
            'success',
            'Data seminar/pelatihan "'.$title.'" berhasil dihapus.'
        );
    }
}
