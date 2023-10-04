<?php

namespace App\Livewire\Contributor;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\Contributor;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    use WithFileUploads;

    public $podcast, $modal;
    public $name, $bio, $role = 'Host', $website, $twitter, $instagram, $avatar, $is_default;

    public function mount()
    {
        $this->podcast = Podcast::findorfail( (int) session('podcast') );
    }

    public function render()
    {
        return view('livewire.contributor.create');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'bio' => 'required',
            'role' => 'required',
            'avatar' => 'required|image|mimes:png,jpg|dimensions:min_width=450,max_width=1000,aspect=1/1'
        ]);

        try {
            $contributor = Contributor::create([
                'name' => $this->name,
                'bio' => $this->bio,
                'role' => $this->role,
                'website' => $this->website,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'avatar' => $this->avatar->store('images'),
                'podcast_id' => $this->podcast->id,
                'is_default' => ($this->is_default == true) ? true : false,
            ]);

            session()->flash('flash.banner', 'A contributor has been successfully added to the podcast!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getTrace());
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'error');
        }
        return redirect()->route('podcast.contributors');
    }
}
