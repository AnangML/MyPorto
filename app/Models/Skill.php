<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true)->orderBy('sort_order', 'asc');
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"description_{$locale}"} ?? $this->description_en ?? $this->description_id;
    }

    public function getProficiencyLabelAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"proficiency_label_{$locale}"} ?? $this->proficiency_label_en ?? $this->proficiency_label_id;
    }
}
