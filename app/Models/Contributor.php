<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function podcasts()
    {
        return $this->belongsToMany(Podcast::class)->withPivot('is_default');
    }
}
