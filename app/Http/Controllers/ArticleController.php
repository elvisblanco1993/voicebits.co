<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $search;

    public function __construct(Request $request)
    {
        $this->search = $request->search ?? '';
    }

    public function index()
    {
        return view('website.articles.index', [
            'search' => $this->search,
            'articles' => Article::where('title', 'like', '%' . $this->search . '%')->whereNotNull('published_at')->orderBy('published_at', 'DESC')->get()
        ]);
    }

    public function show($article)
    {
        return view('website.articles.show', [
            'article' => Article::where('slug', $article)->firstOrFail()
        ]);
    }
}
