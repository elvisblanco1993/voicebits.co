@extends('podcast.templates.edges.layout')

@section('content')
    <div class="bg-black text-white">
        @include('podcast.templates.edges.partials.header')
        @include('podcast.templates.edges.partials.navigation')
    </div>

    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-6">
            <h2 class="text-2xl font-semibold">{{__("Subscribe and Listen")}}</h2>
            <p class="mt-3">{{ __("Listen to $podcast->name using one of these podcasting apps or directories.")}}</p>

            {{-- Insert Providers List here --}}
        </div>
    </main>

    @persist('player')
        @include('podcast.templates.edges.partials.player')
    @endpersist
@endsection
