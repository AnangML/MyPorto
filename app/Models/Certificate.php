<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'issued_at' => 'date',
            'expires_at' => 'date',
            'is_visible' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true)
            ->orderBy('issued_at', 'desc');
    }

    public function getNameAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"name_{$locale}"} ?? $this->name_en ?? $this->name_id ?? '';
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = App::getLocale();

        return $this->{"description_{$locale}"} ?? $this->description_en ?? $this->description_id;
    }
}
