<?php

namespace App\Livewire\Episode;

use Carbon\Carbon;
use App\Models\Episode;
use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class Create extends Component
{
    use WithFileUploads;

    public $title,
        $description,
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
        $track_length;

    protected $listeners = ['getAudioDuration'];

    public function getAudioDuration($duration)
    {
        $this->track_length = $duration;
    }

    public function mount()
    {
        if (!Gate::allows('edit_episodes')) {
            abort(401);
        }
    }

    public function render()
    {
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
                :
                null;
            // Create episode
            Episode::create([
                'guid' => uniqid(),
                'podcast_id' => session('podcast'),
                'title' => $this->title,
                'description' => $this->description,
                'published_at' => ($this->published_at) ? Carbon::parse($this->published_at)->format('Y-m-d H:i:s') : null,
                'season' => $this->season,
                'number' => $this->number,
                'type' => $this->type,
                'explicit' => ($this->explicit === "true") ? 1 : 0,
                'cover' => $artwork,
                'track_url' => $this->track_url,
                'track_size' => ($this->track) ? $this->track->getSize() : 0,
                'track_length' => ($this->track) ? $this->track_length : 0,
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
            'track' => 'required|file|mimes:mp3'
        ];
    }

    public function updated($track)
    {
        $this->validateOnly($track, [
            'title' => 'required',
            'description' => 'required',
            'track' => 'required|file|mimes:mp3|max:102400'
        ]);
    }
}
