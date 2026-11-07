<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }
}
