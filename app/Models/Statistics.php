<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'podcast_id',
        'episode_id',
        'subscriber_id',
        'token',
        'city',
        'region',
        'country',
        'downloads',
        'player',
    ];

    public function podcasts(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }

    public function episodes(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }

    public function subscribers(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }
}
