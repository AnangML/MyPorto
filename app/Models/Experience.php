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
}
