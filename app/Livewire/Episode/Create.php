<?php

namespace App\Livewire\Episode;

use Carbon\Carbon;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class Create extends Component
{
    use WithFileUploads;

    public $podcast;
    public $title,
        $description,
        $scheduled_for,
        $published_at,
        $publish_now,
        $season,
        $number,
        $type = "full",
        $explicit = "false",
        $cover,
        $track,
        $track_url,
        $track_size,
        $track_length,
        $transcript;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
        if (!Gate::allows('edit_episodes') || $this->podcast->is_completed) {
            abort(401);
        }
        $latestEpisode = $this->podcast->episodes()->latest()->first();
        if (!$latestEpisode) {
            $this->season = 1;
            $this->number = 1;
            $this->type = 'trailer';
        } else {
            $this->season = $latestEpisode->season;
            $this->number = $latestEpisode->number + 1;
        }
    }

    public function render()
    {
        if ($this->publish_now) {
            $this->scheduled_for = null;
            $this->published_at = Carbon::parse(now())->format('Y-m-d\TH:i');
        }

        return view('livewire.episode.create', [
            'podcast' => Podcast::findorfail(session('podcast'))
        ]);
    }

    public function save()
    {
        $this->validate();

        try {
            // Upload track
            $this->track_url = $this->track->store('podcasts/' . session('podcast') . '/episodes', config('filesystems.default'));

            // Upload artwork
            $artwork = ($this->cover) ?
                $this->cover->storePublicly('podcasts/' . session('podcast') . '/covers', config('filesystems.default'))
                : null;

            // Upload episode transcript
            $transcript = ($this->transcript) ?
                $this->transcript->storePublicly('podcasts/' . session('podcast') . '/episodes/transcripts', config('filesystems.default'))
                : null;

            if ($this->publish_now) {
                $this->scheduled_for = null;
                $this->published_at = Carbon::now()->format('Y-m-d H:i:s');
            } elseif ($this->published_at && $this->published_at > now()) {
                $this->scheduled_for = Carbon::parse($this->published_at)->format('Y-m-d H:i:s');
                $this->published_at = null;
            } elseif ($this->published_at && $this->published_at <= now()) {
                $this->scheduled_for = null;
                $this->published_at = Carbon::parse($this->published_at)->format('Y-m-d H:i:s');
            }

            // Create episode
            Episode::create([
                'guid' => uniqid(),
                'podcast_id' => $this->podcast->id,
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
                'track_size' => ($this->track) ? $this->track->getSize() : 0,
                'track_length' => ($this->track) ? $this->track_length : 0,
                'transcript' => $transcript,
            ]);

            session()->flash('flash.banner', 'Your new episode is now ready. See more retails below.');
            session()->flash('flash.bannerStyle', 'success');

        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and could not create your episode. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('podcast.episodes');
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'track' => 'required|file|mime:mp3,m4a,mp4a|max:200000',
            'cover' => ['nullable', 'image', 'mimes:png,jpg', 'dimensions:min_width=1500,max_width=3000,aspect=0/0'],
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

    public function deleteTrack()
    {
        $this->track = null;
    }
}
