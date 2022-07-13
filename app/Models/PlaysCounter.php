<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaysCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'podcast_id',
        'episode_id',
        'token',
        'region',
        'country',
        'downloads',
        'webplayer'
    ];

    public function episodes()
    {
        return $this->belongsTo(Episode::class);
    }

    public function podcasts()
    {
        return $this->belongsTo(Podcast::class);
    }
}
