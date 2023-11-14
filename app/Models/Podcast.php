<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Podcast extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'guid',
        'team_id',
        'name',
        'description',
        'url',
        'author',
        'category',
        'language',
        'type',
        'visibility',
        'cover',
        'timezone',
        'explicit',
        'is_locked',
        'funding',
        'funding_text',
        'funding_description',
        'funding_url',
        'podcastindex',
        'spotify',
        'apple',
        'radiopublic',
        'pocketcasts',
        'amazon',
        'pandora',
        'iheartradio',
        'castbox',
        'podcastaddict',
        'deezer',
        'reply_to',
        'allowed_domains',
        'copyright',
        'welcome_email',
        'passkey',
        'txt', // For verification purposes.
        'is_completed', // Marks the podcast completed and cannot add new episodes.
    ];

    protected $with = 'episodes';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function contributors(): HasMany
    {
        return $this->hasMany(Contributor::class);
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
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot(['permissions', 'role']);
    }

    public function owner()
    {
        return $this->belongsToMany(User::class)
            ->wherePivot('role', 'owner')
            ->first();
    }

    public function downloads()
    {
        return $this->hasMany(PlaysCounter::class);
    }

    public function isConnectedToExternalPlayers()
    {
        return ( $this->podcastindex || $this->google || $this->spotify || $this->apple || $this->stitcher || $this->pocketcasts || $this->amazon || $this->pandora || $this->iheartradio || $this->castbox || $this->podcastaddict || $this->deezer || $this->castro) ? true : false;
    }

    public function hasFunding()
    {
        return ($this->funding && $this->funding_text && $this->funding_url) ? true : false;
    }

    public function isPrivate()
    {
        return $this->visibility === 'PRIVATE';
    }

    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }
}
