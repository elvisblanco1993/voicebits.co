<?php

namespace App\Http\Livewire\Show;

use App\Models\Episode;
use App\Models\PlaysCounter;
use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public $modal, $podcast, $verify, $readyToDelete = false;

    public function mount($show)
    {
        $this->podcast = Podcast::findorfail($show);
    }

    public function render()
    {
        return view('livewire.show.delete');
    }

    public function updatedVerify($verify)
    {
        if ($this->verify === $this->podcast->url) {
            $this->readyToDelete = true;
        } else {
            $this->readyToDelete = false;
        }
    }

    public function delete()
    {
        if ($this->verify === $this->podcast->url) {
            $this->deleteEpisodes();
            $this->deletePlays();
            $this->deletePodcast();
        }
        return redirect()->route('shows');
    }

    private function deleteEpisodes()
    {
        foreach ($this->podcast->episodes as $episode) {
            try {
                if ($episode->cover) {
                    Storage::disk(config('filesystems.default'))->delete($episode->cover);
                }
                Storage::disk(config('filesystems.default'))->delete($episode->track_url);
                Episode::findorfail($episode->id)->delete();
            } catch (\Throwable $th) {
                Log::error($th);
            }
        }
    }

    private function deletePlays()
    {
        try {
            PlaysCounter::where('podcast_id', $this->podcast->id)->delete();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    public function deletePodcast()
    {
        try {
            $this->podcast->delete();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
