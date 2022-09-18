<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('web.articles.index', [
            'articles' => Article::whereNotNull('published_at')->get()
        ]);
    }
}
