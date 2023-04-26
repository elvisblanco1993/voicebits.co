<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Social extends Component
{
    public $podcast;
    public $show_social = false, $twitter, $instagram, $facebook, $linkedin, $pinterest, $youtube, $vimeo, $medium;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
        $this->show_social = $this->podcast->show_social;
        $this->twitter = $this->podcast->twitter;
        $this->instagram = $this->podcast->instagram;
        $this->facebook = $this->podcast->facebook;
        $this->linkedin = $this->podcast->linkedin;
        $this->pinterest = $this->podcast->pinterest;
        $this->youtube = $this->podcast->youtube;
        $this->vimeo = $this->podcast->vimeo;
        $this->medium = $this->podcast->medium;
    }

    public function render()
    {
        return view('livewire.show.social');
    }

    public function save()
    {
        try {
            $this->podcast->show_social = $this->show_social;
            $this->podcast->twitter = $this->twitter;
            $this->podcast->instagram = $this->instagram;
            $this->podcast->facebook = $this->facebook;
            $this->podcast->linkedin = $this->linkedin;
            $this->podcast->pinterest = $this->pinterest;
            $this->podcast->youtube = $this->youtube;
            $this->podcast->vimeo = $this->vimeo;
            $this->podcast->medium = $this->medium;
            $this->podcast->save();
            session()->flash('flash.banner', 'Your changes have been saved.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and could not save your changes. Please contact support.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('podcast.social');
    }
}
