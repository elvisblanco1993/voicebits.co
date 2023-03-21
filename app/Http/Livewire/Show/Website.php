<?php

namespace App\Http\Livewire\Show;

use App\Models\Podcast;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Website extends Component
{
    public $podcast, $template, $language;
    public $header_background, $header_text_color, $header_link_color;
    public $body_background, $body_text_color, $body_link_color;

    public function mount()
    {
        if (config('app.env') === 'production') {
            return redirect()->route('podcast.catalog');
        }
        $this->podcast = Podcast::findorfail(session('podcast'));
        $this->template = $this->podcast->website->template;
        $this->language = $this->podcast->website->language;
        $this->header_background = $this->podcast->website->header_background;
        $this->header_text_color = $this->podcast->website->header_text_color;
        $this->header_link_color = $this->podcast->website->header_link_color;
        $this->body_background = $this->podcast->website->body_background;
        $this->body_text_color = $this->podcast->website->body_text_color;
        $this->body_link_color = $this->podcast->website->body_link_color;
    }

    public function save()
    {
        try {
            $this->podcast->website->update([
                'language' => $this->language,
                'header_background' => $this->header_background,
                'header_text_color' => $this->header_text_color,
                'header_link_color' => $this->header_link_color,
                'body_background'   => $this->body_background,
                'body_text_color'   => $this->body_text_color,
                'body_link_color'   => $this->body_link_color,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->route('podcast.website');
    }

    public function setTemplate()
    {
        try {
            $this->podcast->website->update([
                'template' => $this->template,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->route('podcast.website');
    }

    public function render()
    {
        return view('livewire.show.website');
    }
}
