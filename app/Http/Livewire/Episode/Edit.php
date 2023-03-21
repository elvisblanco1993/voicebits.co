<?php

namespace App\Http\Livewire\Episode;

use Carbon\Carbon;
use App\Models\Episode;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $show, $episode, $title, $description, $published_at, $season, $number, $type, $explicit, $cover, $track, $track_url, $track_size, $track_length, $blocked, $embed_url;

    protected $listeners = ['getAudioDuration'];
    public function getAudioDuration($duration)
    {
        $this->track_length = $duration;
    }

    public function mount()
    {
        $this->episode = Episode::find($this->episode);
        $this->title = $this->episode->title;
        $this->description = $this->episode->description;
        $this->published_at = $this->episode->published_at;
        $this->season = $this->episode->season;
        $this->number = $this->episode->number;
        $this->type = $this->episode->type;
        $this->explicit = ($this->episode->explicit) ? "true" : "false";
        $this->track_url = $this->episode->track_url;
        $this->embed_url = route('public.episode.embed', ['guid' => $this->episode->guid, 'player' => 'embed']);
        $this->embed_url = '<embed width="100%" height="160" frameborder="no" scrolling="no" seamless src="' . $this->embed_url . '">';
        $this->blocked = ($this->episode->blocked) ? "true" : "false";
    }

    public function save()
    {
        $this->validate();
        try {
            // Upload track
            if ($this->track) {
                Storage::disk(config('filesystems.default'))->delete($this->episode->track_url);
                $this->track_url = $this->track->store('podcasts/' . $this->episode->podcast_id . '/episodes', config('filesystems.default'));
            } else {
                $this->track_url = $this->episode->track_url;
            }

            // Upload artwork
            if ($this->cover) {
                if ($this->episode->cover) {
                    Storage::disk(config('filesystems.default'))->delete($this->episode->cover);
                }
                $artwork = $this->cover->storePublicly('podcasts/' . $this->episode->podcast_id . '/covers', config('filesystems.default'));
            } else {
                $artwork = $this->episode->cover;
            }

            $this->episode->update([
                'title' => $this->title,
                'description' => $this->description,
                'published_at' => ($this->published_at) ? Carbon::parse($this->published_at)->format('Y-m-d H:i:s') : null,
                'season' => $this->season,
                'number' => $this->number,
                'type' => $this->type,
                'explicit' => ($this->explicit === "true") ? 1 : 0,
                'cover' => $artwork,
                'track_url' => $this->track_url,
                'track_size' => ($this->track) ? $this->track->getSize() : $this->episode->track_size,
                'track_length' => ($this->track) ? $this->track_length : $this->episode->track_length,
                'blocked' => ($this->blocked === "true") ? 1 : 0,
            ]);
            session()->flash('flash.banner', 'Your changes were saved.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and coult not update your episode. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('podcast.episodes');
    }

    public function render()
    {
        return view('livewire.episode.edit');
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function updated($track)
    {
        $this->validateOnly($track, [
            'title' => 'required',
            'description' => 'required',
        ]);
    }
}
