<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(PostCategory::class, 'post_category');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc');
    }

    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"title_{$locale}"} ?? $this->title_en ?? $this->title_id ?? '';
    }

    public function getExcerptAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"excerpt_{$locale}"} ?? $this->excerpt_en ?? $this->excerpt_id;
    }

    public function getContentAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"content_{$locale}"} ?? $this->content_en ?? $this->content_id ?? '';
    }

    /**
     * Public URL for cover image.
     */
    public function getCoverImageUrlAttribute(): ?string
    {
        if ($this->cover_image_path && Storage::disk('public')->exists($this->cover_image_path)) {
            return Storage::disk('public')->url($this->cover_image_path);
        }

        return null;
    }

    /**
     * Estimated reading time in minutes.
     */
    public function getReadingTimeAttribute(): string
    {
        $rawText = strip_tags($this->content ?: $this->excerpt ?: '');
        $words = str_word_count($rawText);
        $minutes = max(1, (int) ceil($words / 180));

        return "{$minutes} min read";
    }
}
