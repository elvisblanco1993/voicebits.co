<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Distribute extends Component
{
    public $podcast;
    public $podcastindex, $apple, $spotify, $google, $stitcher, $podcastaddict, $pocketcasts, $amazon, $pandora, $iheartradio, $castbox, $castro, $deezer;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
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
        return view('livewire.show.distribute');
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
        return redirect()->route('podcast.distribution');
    }

    public function publishToPodcastIndex()
    {
        $base_url = "https://api.podcastindex.org/api/1.0/add/byfeedurl";

        $api_key = config('third-party-providers.podcastindex.key');
        $api_secret = config('third-party-providers.podcastindex.secret');
        $api_header_time = time();
        $hash = sha1($api_key.$api_secret.$api_header_time);

        $headers = [
            "User-Agent" => "Voicebits/1.0",
            "X-Auth-Key" => $api_key,
            "X-Auth-Date" => $api_header_time,
            "Authorization" => $hash
        ];

        $feed = route('public.podcast.feed', ['url' => $this->podcast->url, 'player' => 'podcastindex']);

        // $request = Http::withHeaders($headers)
        //     ->get($base_url, [
        //         'url' => 'https://voicebits.co/s/voicebits-unplugged/feed/podcastindex',
        //     ]);

        // Get podcast
        $request = Http::withHeaders($headers)->get("https://api.podcastindex.org/api/1.0/search/byterm?q=voicebits+unplugged&pretty");

        dd($request->json());
    }
}
