<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Create extends Component
{
    public $modal;
    public $name, $description, $category, $language, $type, $author, $timezone;

    public $rules = [
        'name' => ['required'],
        'description' => ['required'],
        'category' => ['required'],
        'language' => ['required'],
        'type' => ['required'],
        'author' => ['required'],
        'timezone' => ['required']
    ];

    public function save()
    {
        $this->validate();

        try {
            $podcast = Podcast::create([
                'team_id' => Auth::user()->currentTeam->id,
                'name' => $this->name,
                'description' => $this->description,
                'category' => $this->category,
                'language' => $this->language,
                'type' => $this->type,
                'author' => $this->author,
                'timezone' => $this->timezone,
            ]);
            session()->flash('flash.banner', 'Your show is now ready. See more retails below.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue and coult not create your show. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('shows');
        }
        return redirect()->route('show', ['show' => $podcast->id]);
    }

    public function render()
    {
        return view('livewire.show.create');
    }
}
