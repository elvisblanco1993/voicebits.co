<?php

namespace App\Livewire\Episode;

use Carbon\Carbon;
use App\Models\Episode;
use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithFileUploads;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $podcast,
        $episode,
        $title,
        $description,
        $scheduled_for,
        $published_at,
        $publish_now,
        $season,
        $number,
        $type,
        $explicit,
        $cover,
        $track,
        $track_url,
        $track_size,
        $track_length,
        $blocked,
        $embed_url,
        $transcript;
    public $currentEpisodeAudioTrack;

    protected $listeners = ['getAudioDuration'];
    public function getAudioDuration($duration)
    {
        $this->track_length = $duration;
    }

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
        if (!Gate::allows('edit_episodes') || $this->podcast->is_completed) {
            abort(401);
        }

        $this->episode = Episode::find($this->episode);
        $this->title = $this->episode->title;
        $this->description = $this->episode->description;
        $this->scheduled_for = $this->episode->scheduled_for;
        $this->published_at = $this->scheduled_for ?? $this->episode->published_at;
        $this->season = $this->episode->season;
        $this->number = $this->episode->number;
        $this->type = $this->episode->type;
        $this->explicit = ($this->episode->explicit) ? "true" : "false";
        $this->track_url = $this->episode->track_url;
        $this->embed_url = route('public.episode.embed', ['guid' => $this->episode->guid, 'player' => 'embed']);
        $this->embed_url = '<embed width="100%" height="160" frameborder="no" scrolling="no" seamless src="' . $this->embed_url . '">';
        $this->blocked = ($this->episode->blocked) ? "true" : "false";

        $this->currentEpisodeAudioTrack = Storage::disk('vultr')->temporaryUrl(
            $this->episode->track_url, now()->addMinutes(30)
        );
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

            $transcript = ($this->transcript) ?
                $this->transcript->storePublicly('podcasts/' . session('podcast') . '/episodes/transcripts', config('filesystems.default'))
                : $this->episode->transcript;

                // Setup the schedule if needed.
            $this->scheduled_for = (!$this->publish_now && $this->published_at > now())
                ? Carbon::parse($this->published_at)->format('Y-m-d H:i:s')
                : null;

            // Publish episode inmediately
            $this->published_at = ($this->publish_now)
                ? Carbon::now()->format('Y-m-d H:i:s')
                : null;

            $this->episode->update([
                'title' => $this->title,
                'description' => $this->description,
                'scheduled_for' => $this->scheduled_for,
                'published_at' => $this->published_at,
                'season' => $this->season,
                'number' => $this->number,
                'type' => $this->type,
                'explicit' => ($this->explicit === "true") ? 1 : 0,
                'cover' => $artwork,
                'track_url' => $this->track_url,
                'track_size' => ($this->track) ? $this->track_size : $this->episode->track_size,
                'track_length' => ($this->track) ? $this->track_length : $this->episode->track_length,
                'blocked' => ($this->blocked === "true") ? 1 : 0,
                'transcript' => $transcript,
            ]);
            session()->flash('flash.banner', 'Your changes were saved.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and could not update your episode. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('podcast.episodes');
    }

    public function render()
    {
        if ($this->publish_now) {
            $this->scheduled_for = null;
            $this->published_at = Carbon::parse(now())->format('Y-m-d\TH:i');
        }

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
            'track' => 'required|file|mimes:mp3,m4a|max:200000',
        ]);
        if ($this->track) {
            $this->getTrackInfo();
        }
    }

    public function getTrackInfo()
    {
        //instantiate class with file
        $track = new GetId3($this->track->getRealPath());

        // Get all necessary track information
        $this->track_size = $track->extractInfo()['filesize']; // Size
        $this->track_length = $track->getPlaytimeSeconds(); // Duration
    }

    public function deleteTemporaryTrack()
    {
        $this->track = null;
    }
}
