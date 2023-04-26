<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use App\Models\Website;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;

    public $podcast;
    public $name, $description, $url, $category, $language, $type, $author, $cover, $explicit, $is_locked, $funding, $funding_text, $funding_description, $funding_url, $timezone;

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
        $this->name = $this->podcast->name;
        $this->description = $this->podcast->description;
        $this->url = $this->podcast->url;
        $this->category = $this->podcast->category;
        $this->language = $this->podcast->language;
        $this->type = $this->podcast->type;
        $this->author = $this->podcast->author;
        $this->timezone = $this->podcast->timezone;
        $this->explicit = ($this->podcast->explicit) ? "true" : "false";
        $this->is_locked = $this->podcast->is_locked;
        $this->funding = $this->podcast->funding;
        $this->funding_text = $this->podcast->funding_text;
        $this->funding_description = $this->podcast->funding_description;
        $this->funding_url = $this->podcast->funding_url;
    }

    public function render()
    {
        return view('livewire.show.settings');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'language' => ['required'],
            'type' => ['required'],
            'author' => 'required',
            'timezone' => 'required',
        ];
    }

    public function updated($url)
    {
        $this->validateOnly($url, [
            'url' => 'required|unique:podcasts,url,'.$this->podcast->id,
        ]);
    }

    public function save()
    {
        $this->validate();

        if ($this->cover) {
            if ($this->podcast->cover) {
                Storage::disk(config('filesystems.default'))->delete($this->podcast->cover);
            } else {
                $this->validate([
                    'cover' => 'required|image|mimes:png,jpg|dimensions:min_width=1500,max_width=3000,aspect=1/1'
                ]);
            }
            $new_cover_file = $this->cover->storePublicly('podcasts/'.$this->podcast->id.'/covers', config('filesystems.default'));
        }

        try {
            $this->podcast->update([
                'name' => $this->name,
                'description' => $this->description,
                'category' => $this->category,
                'language' => $this->language,
                'type' => $this->type,
                'author' => $this->author,
                'timezone' => $this->timezone,
                'url' => str($this->url)->slug(),
                'cover' => ($this->cover) ? $new_cover_file : $this->podcast->cover,
                'explicit' => ($this->explicit === "true") ? 1 : 0,
                'is_locked' => $this->is_locked,
                'funding' => $this->funding,
                'funding_text' => $this->funding_text,
                'funding_description' => $this->funding_description,
                'funding_url' => $this->funding_url,
            ]);

            if ($this->url) {
                Website::create([
                    'podcast_id' => $this->podcast->id,
                ]);
            }
            session()->flash('flash.banner', 'Your changes were successfully saved.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and coult not save your changes. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('podcast.settings');
    }

    public function removeArtwork()
    {
        if ($this->podcast->cover) {
            Storage::delete($this->podcast->cover);
            $this->podcast->update([
                'cover' => null,
            ]);
        }
        return redirect()->route('podcast.settings');
    }
}
