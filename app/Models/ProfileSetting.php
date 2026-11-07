<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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
     * Get the singleton profile setting record.
     */
    public static function current(): ?self
    {
        return static::query()->first();
    }
}
