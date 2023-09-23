<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $modal, $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.article.delete');
    }

    public function delete()
    {
        try {
            $this->article->delete();
            session()->flash('flash.banner', 'Article deleted!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            session()->flash('flash.banner', 'Oops! Something went wrong on our side and we were not able to delete this article. Please try again later.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('article.index');
    }
}
