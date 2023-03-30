<?php

namespace App\Http\Livewire\Player;

use App\Models\Episode;
use App\Models\Podcast;
use Livewire\Component;
use App\Http\Controllers\PlaysCounterController;

class Slim extends Component
{
    protected $listeners = ['getEpisodeData'];
    public $episode;

    public function render()
    {
        return view('livewire.player.slim');
    }

    public function getEpisodeData($guid)
    {
        $this->episode = Episode::where('guid', $guid)->first();
        $url = route('public.episode.play', ['url' => $this->episode->podcast->url, 'episode' => $guid, 'player' => 'web']);
        $this->emit('gotEpisodeData', $url, $this->episode->title, $guid);
    }
}
