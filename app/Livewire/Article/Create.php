<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    use WithFileUploads;

    public $title, $content, $image, $author, $keywords;

    public function mount()
    {
        $this->author = auth()->user()->name;
    }

    public function render()
    {
        return view('livewire.article.create');
    }

    public function save()
    {
        $stored_image = '';
        // Validate data
        $this->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'required|image|mimes:webp|max:2048',
            'author' => 'required',
        ]);

        try {
            $stored_image = $this->image->store('images');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }

        $article = Article::create([
            'title' => $this->title,
            'slug' => str($this->title)->slug(),
            'content' => $this->content,
            'image' => $stored_image,
            'author' => $this->author,
            'keywords' => $this->keywords,
        ]);
        session()->flash('flash.banner', 'Article created!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('article.edit', ['article' => $article->id]);
    }
}
