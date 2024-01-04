<?php

namespace App\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class Create extends Component
{
    use WithFileUploads;

    public $modal;
    public $name, $description, $cover, $category, $language, $type, $author, $timezone, $visibility;

    public $rules = [
        'name' => ['required'],
        'description' => ['required'],
        'category' => ['required'],
        'language' => ['required'],
        'type' => ['required'],
        'author' => ['required'],
        'timezone' => ['required'],
        'cover' => ['nullable', 'image', 'mimes:png,jpg', 'dimensions:min_width=1500,max_width=3000,aspect=0/0'],
    ];

    public function mount()
    {
        if (!Gate::allows('create_podcasts')) {
            abort(401);
        }
        $this->author = auth()->user()->name;
        $this->language = 'en';
        $this->timezone = "-05:00";
        $this->type = "episodic";
    }

    public function render()
    {
        return view('livewire.show.create');
    }

    public function save()
    {
        $this->validate();
        $artwork = null;

        try {
            $podcast = Podcast::create([
                'guid' => str()->uuid(),
                'name' => $this->name,
                'description' => $this->description,
                'category' => $this->category,
                'language' => $this->language,
                'type' => $this->type,
                'author' => $this->author,
                'timezone' => $this->timezone,
                'visibility' => $this->visibility ? 'PRIVATE' : 'PUBLIC',
                'is_locked' => $this->visibility ? true : false,
                'url' => $this->visibility ? str()->uuid() : str($this->name)->slug(), // If the show is private, create an unique URL automatically
            ]);

            // Upload artwork
            if ($this->cover) {
                $artwork = $this->cover->storePublicly('podcasts/'.$podcast->id.'/covers', config('filesystems.default'));
                $podcast->cover = $artwork;
                $podcast->save();
            }

            // Asssign show to current user
            auth()->user()->podcasts()->attach($podcast->id, [
                'role' => 'owner',
                'permissions' => json_encode(config('auth.podcast_permissions')),
            ]);

            session()->flash('flash.banner', 'Your show is now ready. See more details below.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and coult not create your show. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('podcast.catalog');
        }

        session()->put('podcast', $podcast->id);
        return redirect()->route('podcast.dashboard');
    }
}
