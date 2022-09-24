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
        return view('web.articles.index', [
            'search' => $this->search,
            'articles' => ($this->search)
                ?
                Article::search( $this->search )->where('published_at', '!=', null)->get()
                :
                Article::whereNotNull('published_at')->get()
        ]);
    }

    public function show($article)
    {
        return view('web.articles.show', [
            'article' => Article::where('slug', $article)->firstOrFail()
        ]);
    }
}
