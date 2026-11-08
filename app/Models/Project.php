<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'started_at' => 'date',
            'completed_at' => 'date',
            'published_at' => 'datetime',
            'meta' => 'array',
        ];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ProjectCategory::class, 'project_category');
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }

    /**
     * Scope only published projects.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope featured projects.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"title_{$locale}"} ?? $this->title_en ?? $this->title_id ?? '';
    }

    public function getSummaryAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"summary_{$locale}"} ?? $this->summary_en ?? $this->summary_id ?? '';
    }

    public function getDescriptionAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"description_{$locale}"} ?? $this->description_en ?? $this->description_id ?? '';
    }

    public function getRoleAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"role_{$locale}"} ?? $this->role_en ?? $this->role_id;
    }

    /**
     * Get the public URL for the project cover / showcase image.
     */
    public function getCoverImageUrlAttribute(): ?string
    {
        if ($this->cover_image_path && Storage::disk('public')->exists($this->cover_image_path)) {
            return Storage::disk('public')->url($this->cover_image_path);
        }

        return null;
    }

    /**
     * Alias for thumbnail path backwards compatibility.
     */
    public function getThumbnailPathAttribute(): ?string
    {
        return $this->cover_image_path;
    }

    /**
     * Get URLs for additional gallery screenshots stored in meta.
     *
     * @return array<int, array{path: string, url: string}>
     */
    public function getScreenshotsUrlsAttribute(): array
    {
        $screenshots = $this->meta['screenshots'] ?? [];
        $urls = [];

        foreach ($screenshots as $path) {
            if ($path && Storage::disk('public')->exists($path)) {
                $urls[] = [
                    'path' => $path,
                    'url' => Storage::disk('public')->url($path),
                ];
            }
        }

        return $urls;
    }
}
