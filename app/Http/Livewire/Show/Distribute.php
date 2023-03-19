<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Distribute extends Component
{
    public $show, $podcast;
    public $podcastindex, $apple, $spotify, $google, $stitcher, $podcastaddict, $pocketcasts, $amazon, $pandora, $iheartradio, $castbox, $castro, $deezer;

    public function mount()
    {
        $this->podcast = Podcast::findorfail( (int) session('podcast') );
        $this->podcastindex = $this->podcast->podcastindex;
        $this->apple = $this->podcast->apple;
        $this->spotify = $this->podcast->spotify;
        $this->google = $this->podcast->google;
        $this->stitcher = $this->podcast->stitcher;
        $this->pocketcasts = $this->podcast->pocketcasts;
        $this->amazon = $this->podcast->amazon;
        $this->pandora = $this->podcast->pandora;
        $this->iheartradio = $this->podcast->iheartradio;
        $this->podcastaddict = $this->podcast->podcastaddict;
        $this->castbox = $this->podcast->castbox;
        $this->castro = $this->podcast->castro;
        $this->deezer = $this->podcast->deezer;
    }

    public function render()
    {
        return view('livewire.show.distribute')
            ->layout('layouts.app', ['podcast' => $this->podcast]);
    }

    public function save()
    {
        try {
            $this->podcast->podcastindex = $this->podcastindex;
            $this->podcast->apple = $this->apple;
            $this->podcast->spotify = $this->spotify;
            $this->podcast->google = $this->google;
            $this->podcast->stitcher = $this->stitcher;
            $this->podcast->pocketcasts = $this->pocketcasts;
            $this->podcast->amazon = $this->amazon;
            $this->podcast->pandora = $this->pandora;
            $this->podcast->iheartradio = $this->iheartradio;
            $this->podcast->podcastaddict = $this->podcastaddict;
            $this->podcast->castbox = $this->castbox;
            $this->podcast->castro = $this->castro;
            $this->podcast->deezer = $this->deezer;
            $this->podcast->save();
            session()->flash('flash.banner', 'Your changes have been saved.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and could not save your changes. Please contact support.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('show.distribution');
    }
}
