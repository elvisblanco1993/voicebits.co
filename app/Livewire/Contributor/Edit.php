<?php

namespace App\Livewire\Contributor;

use App\Models\Podcast;
use Livewire\Component;
use App\Models\Contributor;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $podcast, $modal;
    public Contributor $contributor;
    public $name, $bio, $role, $website, $twitter, $instagram, $avatar, $is_default;

    public function mount()
    {
        $this->podcast = Podcast::findorfail( (int) session('podcast') );
        $this->name = $this->contributor->name;
        $this->bio = $this->contributor->bio;
        $this->role = $this->contributor->role;
        $this->website = $this->contributor->website;
        $this->instagram = $this->contributor->instagram;
        $this->twitter = $this->contributor->twitter;
        $this->is_default = $this->contributor->is_default;
    }

    public function render()
    {
        return view('livewire.contributor.edit');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'bio' => 'required',
            'role' => 'required',
            'avatar' => 'nullable|image|mimes:png,jpg|dimensions:min_width=450,max_width=3000,aspect=1/1'
        ]);

        try {
            if ($this->avatar && $this->contributor->avatar) {
                Storage::delete($this->contributor->avatar);
            }

            $this->contributor->update([
                'name' => $this->name,
                'bio' => $this->bio,
                'role' => $this->role,
                'website' => $this->website,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'avatar' => ($this->avatar) ? $this->avatar->store('images') : $this->contributor->avatar,
                'is_default' => ($this->is_default == true) ? true : false,
            ]);

            session()->flash('flash.banner', 'Changes saved!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getTrace());
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'error');
        }
        return redirect()->route('podcast.contributors');
    }
}
