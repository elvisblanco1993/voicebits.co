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

        @vite('resources/css/app.css')
        @livewireStyles
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased min-h-screen bg-white">
        @include('website.partials.navbar')
        <article class="md:py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-0 text-slate-800" itemtype="http://schema.org/Article">
            <div>
                <a href="{{ route('blog.index') }}" class="text-sm text-slate-400 underline hover:text-slate-600 transition-all">Voicebits blog</a>
            </div>
            <h1 class="mt-6 text-5xl lg:text-6xl font-bold">{{ $article->title }}</h1>
            <img src="{{ asset($article->image) }}" alt="Image for {{ $article->title }}" class="mt-12 w-full rounded-xl aspect-video object-cover object-center">
            <div class="my-12 text-sm font-light">
                <span>Written by {{ $article->author}} &middot; {{ Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</span>
            </div>
            <div class="prose prose-blue max-w-full">
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

        @include('website.partials.cta')
        @include('website.partials.footer')
        @livewireScripts
    </body>
</html>
