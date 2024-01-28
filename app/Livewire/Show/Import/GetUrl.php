<?php

namespace App\Livewire\Show\Import;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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

        $feed = new \SimplePie\SimplePie();
        $feed->set_feed_url($this->url);
        $feed->cache_location = storage_path('simplepie');
        $feed->init();
        $feed->handle_content_type();

        // dd(
        //     $feed->get_items()[0]->get_item_tags(\SimplePie\SimplePie::NAMESPACE_ITUNES, 'season')[0]['data']
        // );

        // Validate the feed url
        if ($feed->error()) {
            session()->flash('flash.banner', substr($feed->error(), 0, strpos($feed->error, ';')));
            session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('podcast.import.start');
        }

        $this->name = $feed->get_title();
        $this->owner_name = $feed->get_channel_tags(\SimplePie\SimplePie::NAMESPACE_ITUNES, 'owner')[0]['child'][\SimplePie\SimplePie::NAMESPACE_ITUNES]['name'][0]['data'];
        $this->owner_email = $feed->get_channel_tags(\SimplePie\SimplePie::NAMESPACE_ITUNES, 'owner')[0]['child'][\SimplePie\SimplePie::NAMESPACE_ITUNES]['email'][0]['data'];
        $this->cover = $feed->get_image_url();

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
