<?php

namespace App\Http\Livewire\Player;

use App\Models\Episode;
use Livewire\Component;
use App\Http\Controllers\PlaysCounterController;

class Player extends Component
{
    protected $listeners = ['getEpisodeData', 'countPlay'];
    public $episode;

    public function render()
    {
        return view('livewire.player.player');
    }

    public function getEpisodeData($guid)
    {
        $this->episode = Episode::where('guid', $guid)->first();
        $url = route('episode.play', ['url' => $this->episode->podcast->url, 'episode' => $guid, 'player' => 'web']);
        $this->emit('gotEpisodeData', $url, $this->episode->title, $guid);
    }

    public function countPlay()
    {
        (new PlaysCounterController)->playCounter($this->episode->id, $this->episode->podcast_id, 'web');
    }
}
