<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contributor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }
}
