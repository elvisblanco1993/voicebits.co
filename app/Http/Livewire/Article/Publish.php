<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Publish extends Component
{
    public $article;
    public function mount(Article $article){
        $this->article = $article;
    }
    public function render()
    {
        return view('livewire.article.publish');
    }

    public function publish()
    {
        if ($this->article->published_at) {
            $this->article->published_at = null;
            session()->flash('flash.banner', 'Article unpublished: ' . $this->article->title);
        } else {
            $this->article->published_at = now();
            session()->flash('flash.banner', 'Article published: ' . $this->article->title);
        }
        $this->article->save();
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('article.index');
    }
}
