<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $article, $title, $content, $image, $author;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->author = $this->article->author;
    }

    public function render()
    {
        return view('livewire.article.edit');
    }

    public function save()
    {
        $stored_image = $this->article->image;
        // Validate data
        $this->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'author' => 'required',
        ]);

        // Run file validation only if a new image is uploaded.
        if ($this->image) {

            $this->validate([
                'image' => 'required|image|mimes:png,jpg,webp|max:2048',
            ]);

            $this->deleteImage();

            try {
                $stored_image = $this->image->store('images');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }
        }

        try {
            $this->article->update([
                'title' => $this->title,
                'content' => $this->content,
                'image' => $stored_image,
                'author' => $this->author,
            ]);
            session()->flash('flash.banner', 'Article created!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('article.edit', ['article' => $this->article->id]);
    }

    public function deleteImage()
    {
        try {
            Storage::disk('local')->delete($this->article->image);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
