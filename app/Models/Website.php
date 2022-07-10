<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        'podcast_id',
        'template',
        'header_background',
        'header_text_color',
        'header_link_color',
        'body_background',
        'body_text_color',
        'body_link_color',
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
