<?php

namespace App\Http\Livewire\Show\Import;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GetUrl extends Component
{
    public $url;
    public  $name, $owner_email, $cover, $owner_name;

    protected $rules = [
        'url' => ['required', 'url']
    ];

    public function save()
    {
        $this->validate();

        // Validate the feed url
        try {
            $feed = simplexml_load_file($this->url);
        } catch (\Throwable $th) {
            return redirect()->to('/show/import')->with('error', 'Failed to load feed. Please make sure this is a working RSS feed link and try again.');
        }

        if (empty($feed)) {
            return redirect()->to('/show/import')->with('error', 'Failed to load feed. Please make sure this is a working RSS feed link and try again.');
        }

        $this->name = $feed->channel->title->__toString();
        $this->owner_name = $feed->xpath("//itunes:owner//itunes:name")[0]->__toString();
        $this->owner_email = $feed->xpath("//itunes:owner//itunes:email")[0]->__toString();
        $this->cover = ( $feed->channel->image->url ) ? $feed->channel->image->url->__toString() : $feed->xpath("//itunes:image")[0]['href']->__toString();

        $temporary_podcast = DB::table('temporary_podcasts')
            ->insertGetId([
                'user_id' => auth()->user()->id,
                'name' => $this->name,
                'owner_name' => $this->owner_name,
                'owner_email' => $this->owner_email,
                'cover' => $this->cover,
                'feed_url' => $this->url,
            ]);
        return redirect()->route('podcast.import.verify', ['temporary_podcast' => $temporary_podcast]);
    }

    public function render()
    {
        return view('livewire.show.import.get-url');
    }
}
