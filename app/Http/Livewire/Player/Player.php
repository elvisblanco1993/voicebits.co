<?php

namespace App\Http\Livewire\Player;

use App\Models\Episode;
use Livewire\Component;

class Player extends Component
{
    protected $listeners = ['getEpisodeUrl'];

    public function getEpisodeUrl($guid)
    {
        $episode = Episode::where('guid', $guid)->first();
        $url = route('episode.play', ['url' => $episode->podcast->url, 'episode' => $guid]);
        $this->emit('gotEpisodeUrl', $url, $episode->title, $guid);
    }

    public function render()
    {
        return view('livewire.player.player');
    }
}
