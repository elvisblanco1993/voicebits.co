<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcast extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'team_id',
        'name',
        'description',
        'url',
        'author',
        'category',
        'language',
        'type',
        'cover',
        'timezone',
        'explicit',
        'is_locked',
        'funding',
        'funding_text',
        'funding_url',
    ];

    protected $with = 'episodes';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class)->orderBy('published_at', 'DESC');
    }

    public function plays()
    {
        return $this->hasMany(PlaysCounter::class);
    }

    public function website()
    {
        return $this->hasOne(Website::class);
    }

    public function isReadyToDistribute()
    {
        return ($this->url && $this->cover ) ? true : false;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
