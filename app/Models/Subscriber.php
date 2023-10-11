<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscriber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }
}
