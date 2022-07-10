<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'guid',
        'podcast_id',
        'title',
        'description',
        'published_at',
        'season',
        'number',
        'type',
        'explicit',
        'cover',
        'track_url',
        'track_size',
        'track_length',
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }

    public function plays()
    {
        return $this->hasMany(PlaysCounter::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
