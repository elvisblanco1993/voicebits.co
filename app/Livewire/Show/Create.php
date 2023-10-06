<?php

namespace App\Livewire\Show;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;

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
        'timezone' => ['required']
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

    public function save()
    {
        $this->validate();
        try {
            $podcast = Podcast::create([
                'name' => $this->name,
                'description' => $this->description,
                'category' => $this->category,
                'language' => $this->language,
                'type' => $this->type,
                'author' => $this->author,
                'timezone' => $this->timezone,
                'visibility' => $this->visibility ? 'PRIVATE' : 'PUBLIC',
                'is_locked' => $this->visibility ? true : false,
            ]);
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

    public function render()
    {
        return view('livewire.show.create');
    }
}
