<?php

namespace App\Http\Livewire\Episode;

use App\Models\Episode;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public $modal, $episode;
    public function mount(Episode $episode)
    {
        $this->episode = $episode;
    }

    public function render()
    {
        return view('livewire.episode.delete');
    }

    /**
     * Delete episode from Voicebits
     * Removes episode cover, audio track, and episode data from DB.
     */
    public function delete()
    {
        try {
            if ($this->episode->cover) {
                Storage::disk(config('filesystems.default'))->delete($this->episode->cover);
            }
            Storage::disk(config('filesystems.default'))->delete($this->episode->track_url);
            $this->episode->delete();
            session()->flash('flash.banner', 'Episode successfully deleted!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and coult not delete your episode. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('episodes', ['show' => $this->episode->podcast_id]);
    }
}
