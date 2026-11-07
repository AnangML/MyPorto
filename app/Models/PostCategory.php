<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;

class PostCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }

    public function getNameAttribute(): string
    {
        $locale = App::getLocale();

        return $this->{"name_{$locale}"} ?? $this->name_en ?? $this->name_id ?? '';
    }
}
