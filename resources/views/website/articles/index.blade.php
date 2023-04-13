@extends('website.layout')
@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-0 text-slate-800">
        <div class="py-20 text-center">
            <div class="col-span-12 md:col-span-8">
                <h1 class="text-4xl md:text-5xl font-bold leading-10">News and Updates from Voicebits</h1>
                <p class="mt-6 text-lg sm:text-xl font-medium">We often publish articles about Voicebits news and features, as well as topics of interest in the podcasting industry.</p>
            </div>
        </div>

        <div class="mt-12 sm:flex items-center justify-between">
            <p class="text-2xl font-bold">Latest articles</p>
            <form action="?search=" method="get">
                <input type="search" placeholder="Search..." name="search" value="{{$search}}"
                class="border-gray-300 focus:border-violet-300 focus:ring focus:ring-violet-200 focus:ring-opacity-50 rounded-lg shadow-sm">
            </form>
        </div>

        <div class="my-12 grid grid-cols-2 gap-8">

            @forelse ($articles as $article)
                @if (!$loop->first)
                    <article class="col-span-2 md:col-span-1" itemtype="http://schema.org/Article">
                        <a href="{{ route('blog.article', ['article' => $article->slug]) }}">
                            <img src="{{ asset($article->image) }}" alt="" class="w-full aspect-video rounded-xl object-cover object-center">
                            <h2 class="mt-4 text-2xl font-bold underline">{{ $article->title }}</h2>
                        </a>
                        <p class="mt-2 text-base">{{ strip_tags(str($article->content)->markdown()->words(35, '[...]')) }}</p>
                        <div class="mt-4 text-sm font-mono">
                            <span>Written by {{ $article->author }}</span>
                            <span class="block mt-2">{{ Carbon\Carbon::parse($article->published_at)->format('M d, Y') }} &middot; <a href="{{ route('blog.article', ['article' => $article->slug]) }}" class="underline text-violet-600">Read article</a></span>
                        </div>
                    </article>
                @else
                    <article class="col-span-2 grid grid-cols-12 gap-8">
                        <div class="col-span-12 md:col-span-8">
                            <a href="{{ route('blog.article', ['article' => $article->slug]) }}">
                                <img src="{{ asset($article->image) }}" alt="" class="w-full aspect-video rounded-xl object-cover object-center">
                            </a>
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <a href="{{ route('blog.article', ['article' => $article->slug]) }}">
                                <h2 class="text-2xl font-bold underline">{{ $article->title }}</h2>
                            </a>
                            <p class="mt-2 text-base">{{ strip_tags(str($article->content)->markdown()->words(35, '[...]')) }}</p>
                            <div class="mt-6 text-sm font-light font-mono">
                                <span>Written by {{ $article->author }}</span>
                                <span class="block mt-2">{{ Carbon\Carbon::parse($article->published_at)->format('M d, Y') }} &middot; <a href="{{ route('blog.article', ['article' => $article->slug]) }}" class="underline text-violet-600">Read article</a></span>
                            </div>
                        </div>
                    </article>
                @endif
            @empty

            @endforelse

        </div>

    </div>
    @include('website.partials.cta')

@endsection
