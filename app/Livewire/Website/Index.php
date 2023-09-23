<?php

namespace App\Livewire\Website;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Index extends Component
{
    public $podcast, $template, $language;
    public $header_background, $header_text_color, $header_link_color;
    public $body_background, $body_text_color, $body_link_color;

    public function mount()
    {
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

    public function render()
    {
        return view('livewire.website.index');
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
}
