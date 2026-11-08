<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public const LOCATION_TYPES = [
        'offline' => [
            'id' => 'Tatap Muka (Offline / Dalam Negeri)',
            'en' => 'In-Person / Onsite (Indonesia)',
        ],
        'online' => [
            'id' => 'Daring / Remote / WFH (Online)',
            'en' => 'Virtual / Remote / WFH',
        ],
        'international' => [
            'id' => 'Luar Negeri / Internasional',
            'en' => 'International / Overseas',
        ],
    ];

    protected static function booted(): void
    {
        static::saving(function (self $experience) {
            if ($experience->location_type) {
                $experience->location = $experience->location_display;
            }
        });
    }

    protected function casts(): array
    {
        return [
            'started_at' => 'date',
            'ended_at' => 'date',
            'is_current' => 'boolean',
            'is_visible' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true)
            ->orderBy('is_current', 'desc')
            ->orderBy('started_at', 'desc');
    }

    public function getPositionAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"position_{$locale}"} ?? $this->position_en ?? $this->position_id ?? '';
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"description_{$locale}"} ?? $this->description_en ?? $this->description_id;
    }

    public function getLocationDisplayAttribute(): string
    {
        if ($this->location_type === 'online') {
            return $this->venue_or_platform ? 'Remote / Online ('.$this->venue_or_platform.')' : 'Remote / WFH';
        }

        if ($this->location_type === 'international') {
            return $this->venue_or_platform ?: ($this->location ?: 'International');
        }

        $parts = array_filter([$this->city, $this->province]);
        $location = implode(', ', $parts);

        if ($this->venue_or_platform) {
            return $location ? $this->venue_or_platform.' — '.$location : $this->venue_or_platform;
        }

        return $location ?: ($this->location ?: 'Indonesia');
    }
}
