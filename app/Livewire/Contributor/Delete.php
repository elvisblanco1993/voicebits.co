<?php

namespace App\Livewire\Contributor;

use Livewire\Component;
use App\Models\Contributor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public Contributor $contributor;
    public $modal;

    public function render()
    {
        return view('livewire.contributor.delete');
    }

    public function delete()
    {
        try {
            Storage::delete($this->contributor->avatar);
            $this->contributor->podcasts()->detach();
            $this->contributor->episodes()->detach();
            $this->contributor->delete();
            session()->flash('flash.banner', 'A contributor has been successfully deleted from this podcast!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getTrace());
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'error');
        }
        return redirect()->route('podcast.contributors');
    }
}
