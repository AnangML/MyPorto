<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;

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
}
