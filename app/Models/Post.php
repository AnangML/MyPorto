<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;

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
}
