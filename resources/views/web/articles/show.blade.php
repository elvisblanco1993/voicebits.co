@extends('web.website.layout')

@section('content')

<article class="md:py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-0 text-slate-800 dark:text-white" itemtype="http://schema.org/Article">
    <div>
        <a href="{{ route('blog.index') }}" class="text-sm text-slate-400 underline hover:text-slate-600 transition-all">Voicebits blog</a>
    </div>
    <h1 class="mt-6 text-5xl lg:text-6xl font-bold">{{ $article->title }}</h1>
    <img src="{{ asset($article->image) }}" alt="Image for {{ $article->title }}" class="mt-12 w-full rounded-xl aspect-video object-cover object-center">
    <div class="my-12 text-sm font-light">
        <span>Written by {{ $article->author}} &middot; {{ Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</span>
    </div>
    <div class="prose dark:prose-invert prose-blue max-w-full">
        {!! Str::of($article->content)->markdown() !!}
    </div>

    {{-- Maybe this can be separated into its own component --}}
    <div class="mt-12">
        <h3 class="text-2xl font-bold">You might also enjoy reading:</h3>
        <ul class="mt-4 prose">
            @forelse (App\Models\Article::whereNotNull('published_at')->where('slug', '!=', $article->slug)->orderBy('published_at', 'desc')->take(3)->get() as $related_article)
                <li class="list-disc">
                    <a href="{{ route('blog.article', ['article' => $related_article->slug]) }}" class="text-indigo-600 underline hover:text-indigo-700">{{ $related_article->title }}</a>
                </li>
            @empty
            @endforelse
        </ul>
    </div>
</article>

@endsection
