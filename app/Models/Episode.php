<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Episode extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'guid',
        'podcast_id',
        'title',
        'description',
        'scheduled_for',
        'published_at',
        'season',
        'number',
        'type',
        'explicit',
        'cover',
        'track_url',
        'track_size',
        'track_length',
        'blocked',
        'transcript',
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }

    public function contributors(): BelongsToMany
    {
        return $this->belongsToMany(Contributor::class);
    }

    public function statistics(): HasMany
    {
        return $this->hasMany(Statistics::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }

    /**
     * Gets the published episodes
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<', now())->orderBy('published_at', 'desc');
    }
}
