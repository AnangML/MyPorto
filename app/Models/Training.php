<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Training extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The 11 official sub-vocations requested by user with bilingual labels.
     *
     * @var array<string, array{id: string, en: string, combined: string}>
     */
    public const SUB_VOCATIONS = [
        'networking' => [
            'id' => 'Jaringan Komputer',
            'en' => 'Networking',
            'combined' => 'Jaringan Komputer / Networking',
        ],
        'technical_support' => [
            'id' => 'Dukungan Teknis',
            'en' => 'Technical Support',
            'combined' => 'Dukungan Teknis / Technical Support',
        ],
        'computer_engineering' => [
            'id' => 'Teknik Komputer',
            'en' => 'Computer Engineering',
            'combined' => 'Teknik Komputer / Computer Engineering',
        ],
        'programming' => [
            'id' => 'Pemrograman',
            'en' => 'Programming',
            'combined' => 'Pemrograman / Programming',
        ],
        'multimedia' => [
            'id' => 'Multimedia',
            'en' => 'Multimedia',
            'combined' => 'Multimedia',
        ],
        'database' => [
            'id' => 'Basis Data',
            'en' => 'Database',
            'combined' => 'Basis Data / Database',
        ],
        'system_analyst' => [
            'id' => 'Analis Sistem',
            'en' => 'System Analyst',
            'combined' => 'Analis Sistem / System Analyst',
        ],
        'artificial_intelligence' => [
            'id' => 'Kecerdasan Buatan',
            'en' => 'Artificial Intelligence',
            'combined' => 'Kecerdasan Buatan / Artificial Intelligence',
        ],
        'public_relations' => [
            'id' => 'Hubungan Masyarakat',
            'en' => 'Public Relations',
            'combined' => 'Hubungan Masyarakat / Public Relations',
        ],
        'graphic_design' => [
            'id' => 'Desain Grafis',
            'en' => 'Graphic Design',
            'combined' => 'Desain Grafis / Graphic Design',
        ],
        'it_governance' => [
            'id' => 'Tata Kelola TI',
            'en' => 'IT Governance',
            'combined' => 'Tata Kelola TI / IT Governance',
        ],
    ];

    /**
     * Types of professional development activities.
     *
     * @var array<string, array{id: string, en: string}>
     */
    public const TYPES = [
        'seminar' => [
            'id' => 'Seminar',
            'en' => 'Seminar',
        ],
        'training' => [
            'id' => 'Pelatihan',
            'en' => 'Training',
        ],
        'workshop' => [
            'id' => 'Workshop / Praktik',
            'en' => 'Workshop & Hands-on',
        ],
        'certification' => [
            'id' => 'Sertifikasi Kompetensi',
            'en' => 'Certification Exam',
        ],
        'bootcamp' => [
            'id' => 'Bootcamp Intensif',
            'en' => 'Intensive Bootcamp',
        ],
    ];

    /**
     * Location classification types.
     *
     * @var array<string, array{id: string, en: string}>
     */
    public const LOCATION_TYPES = [
        'offline' => [
            'id' => 'Tatap Muka (Offline / Dalam Negeri)',
            'en' => 'In-Person / Onsite (Indonesia)',
        ],
        'online' => [
            'id' => 'Daring / Webinar (Online Remote)',
            'en' => 'Virtual / Webinar (Remote)',
        ],
        'international' => [
            'id' => 'Luar Negeri / Internasional',
            'en' => 'International / Overseas',
        ],
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_visible' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order', 'asc')
            ->orderBy('start_date', 'desc');
    }

    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"title_{$locale}"} ?? $this->title_id ?? $this->title_en ?? '';
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"description_{$locale}"} ?? $this->description_id ?? $this->description_en;
    }

    public function getSubVocationLabelAttribute(): string
    {
        $info = self::SUB_VOCATIONS[$this->sub_vocation] ?? null;
        if (! $info) {
            return $this->sub_vocation;
        }

        $locale = App::getLocale();

        return $info[$locale] ?? $info['combined'];
    }

    public function getSubVocationCombinedAttribute(): string
    {
        return self::SUB_VOCATIONS[$this->sub_vocation]['combined'] ?? $this->sub_vocation;
    }

    public function getTypeLabelAttribute(): string
    {
        $locale = App::getLocale();

        return self::TYPES[$this->type][$locale] ?? self::TYPES[$this->type]['id'] ?? ucfirst($this->type);
    }

    public function getLocationDisplayAttribute(): string
    {
        if ($this->location_type === 'online') {
            return $this->venue_or_platform ? 'Online ('.$this->venue_or_platform.')' : 'Online / Webinar';
        }

        if ($this->location_type === 'international') {
            return $this->venue_or_platform ?: 'International';
        }

        $parts = array_filter([$this->city, $this->province]);
        $location = implode(', ', $parts);

        if ($this->venue_or_platform) {
            return $location ? $this->venue_or_platform.' — '.$location : $this->venue_or_platform;
        }

        return $location ?: 'Indonesia';
    }

    public function getCertificateUrlResolvedAttribute(): ?string
    {
        if ($this->certificate_file_path && Storage::disk('public')->exists($this->certificate_file_path)) {
            return Storage::disk('public')->url($this->certificate_file_path);
        }

        return $this->certificate_url;
    }
}
