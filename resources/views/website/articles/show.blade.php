<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Voicebits is the hosting and distribution platform for all your podcasts." />
        <link rel="shortcut icon" href="{{ asset('logo-mark.svg') }}" type="image/svg">
        <title>{{ $article->title . " - " . config('app.name', 'Laravel') }}</title>
        <link rel="canonical" href="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset($article->image) }}">

        {{-- Keywords --}}
        @forelse (explode(',', $article->keywords) as $item)
            <meta property="article:tag" content="{{ trim($item) }}" />
        @empty
        @endforelse

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        @vite('resources/css/app.css')
        @livewireStyles
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased min-h-screen bg-white dark:bg-slate-800">
        @include('website.partials.navbar')
        <article class="py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8" itemtype="http://schema.org/Article">
            <div>
                <a href="{{ route('blog.index') }}" class="text-sm text-slate-400 underline hover:text-slate-600 transition-all"> <- Back to all articles</a>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold text-black dark:text-white">{{ $article->title }}</h1>
            <img src="{{ asset($article->image) }}" alt="Image for {{ $article->title }}" class="mt-12 w-full rounded-xl aspect-video object-cover object-center">
            <div class="my-12 text-sm font-mono text-black dark:text-white">
                <span>Written by {{ $article->author}} &middot; {{ Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</span>
            </div>

            <div class="max-w-full prose prose-lg prose-indigo dark:prose-invert">
                {!! Str::markdown($article->content) !!}
            </div>
        </article>

        {{-- Maybe this can be separated into its own component --}}
        @if (App\Models\Article::whereNotNull('published_at')->where('slug', '!=', $article->slug)->count() > 0)
            <div class="py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-slate-800 dark:text-white">
                <h3 class="text-2xl font-bold">You might also enjoy reading:</h3>
                <ul class="mt-4 prose">
                    @forelse (App\Models\Article::whereNotNull('published_at')->where('slug', '!=', $article->slug)->orderBy('published_at', 'desc')->take(3)->get() as $related_article)
                    <li class="list-none">
                        <a href="{{ route('blog.article', ['article' => $related_article->slug]) }}" class="text-indigo-600 dark:text-indigo-400 underline hover:text-indigo-700 dark:hover:text-indigo-600">{{ $related_article->title }}</a>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        @endif
        @include('website.partials.footer')
        @livewireScripts
    </body>
</html>
