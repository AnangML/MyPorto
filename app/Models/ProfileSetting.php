<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ProfileSetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'availability_status' => 'boolean',
            'meta' => 'array',
        ];
    }

    /**
     * Localized headline accessor.
     */
    public function getHeadlineAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"headline_{$locale}"} ?? $this->headline_en ?? $this->headline_id ?? '';
    }

    /**
     * Parse the headline into prefix, accent, and suffix for editorial typography.
     *
     * @return array{prefix: string, accent: string, suffix: string}
     */
    public function getHeadlinePartsAttribute(): array
    {
        $headline = trim($this->headline);

        if (empty($headline)) {
            return [
                'prefix' => __('portfolio.hero.headline_prefix').' '.__('portfolio.hero.headline_middle'),
                'accent' => __('portfolio.hero.headline_accent'),
                'suffix' => '',
            ];
        }

        // 1. Explicit accent markup using *word* or _word_
        if (preg_match('/^(.*?)[*_]([^*_]+)[*_](.*)$/us', $headline, $matches)) {
            return [
                'prefix' => trim($matches[1]),
                'accent' => trim($matches[2]),
                'suffix' => trim($matches[3]),
            ];
        }

        // 2. Intelligent word boundary splitting
        $words = preg_split('/\s+/u', $headline, -1, PREG_SPLIT_NO_EMPTY);
        $total = count($words);

        if ($total <= 1) {
            return [
                'prefix' => $headline,
                'accent' => '',
                'suffix' => '',
            ];
        }

        if ($total <= 3) {
            $accent = array_pop($words);

            return [
                'prefix' => implode(' ', $words),
                'accent' => $accent,
                'suffix' => '',
            ];
        }

        // 4+ words: accent the last 2 words
        $accentWords = array_splice($words, -2);

        return [
            'prefix' => implode(' ', $words),
            'accent' => implode(' ', $accentWords),
            'suffix' => '',
        ];
    }

    /**
     * Localized bio accessor.
     */
    public function getBioAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"bio_{$locale}"} ?? $this->bio_en ?? $this->bio_id ?? '';
    }

    /**
     * Localized SEO title accessor.
     */
    public function getSeoTitleAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"seo_title_{$locale}"} ?? $this->seo_title_en ?? $this->seo_title_id;
    }

    /**
     * Localized SEO description accessor.
     */
    public function getSeoDescriptionAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"seo_description_{$locale}"} ?? $this->seo_description_en ?? $this->seo_description_id;
    }

    /**
     * Resolve the public URL of the profile/hero photo with default fallback.
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo_path && Storage::disk('public')->exists($this->profile_photo_path)) {
            return asset('storage/'.$this->profile_photo_path);
        }

        return asset('images/portrait.jpg');
    }

    /**
     * Get the singleton profile setting record.
     */
    public static function current(): ?self
    {
        return static::query()->first();
    }
}
