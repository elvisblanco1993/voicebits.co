@extends('podcast.templates.modern.layout')

@section('content')
<div x-data="{
    activePage: '',
    init(){
        if(localStorage.getItem('active') === null) {
            localStorage.setItem('active', 'home');
            $data.activePage = 'home';
        } else {
            $data.activePage = localStorage.getItem('active');
        }

        this.$watch('activePage', ()=>{
            localStorage.setItem('active', $data.activePage);
        });
    }
}"
>
    {{-- Slim player --}}
    @livewire('player.slim')
    {{-- End of Slim player --}}
    {{-- Navbar --}}
    <div class="w-full">
        <nav class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between border-b md:border-b-0">
            {{-- About --}}
            <div class="hidden md:flex items-center space-x-12">
                <button x-on:click="activePage = 'home'" :class="activePage == 'home' ? 'border-b-4 border-b-slate-900' : '' ">{{ __("Home") }}</button>
                <button x-on:click="activePage = 'episodes'" :class="activePage == 'episodes' ? 'border-b-4 border-b-slate-900' : '' ">{{ __("Episodes") }}</button>
            </div>

            <div class="hidden md:flex items-center space-x-3">
                @include('podcast.templates.modern.partials.social')
                <a href="{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}" target="_blank">
                    <svg class="w-5 h-5 fill-[#FFA500]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>RSS</title><path d="M19.199 24C19.199 13.467 10.533 4.8 0 4.8V0c13.165 0 24 10.835 24 24h-4.801zM3.291 17.415c1.814 0 3.293 1.479 3.293 3.295 0 1.813-1.485 3.29-3.301 3.29C1.47 24 0 22.526 0 20.71s1.475-3.294 3.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727 0 15.909 7.184 15.909 15.91z"/></svg>
                </a>
            </div>

            {{-- Mobile menu --}}
            <a href="{{ url()->current() }}" class="block md:hidden text-lg font-medium">{{ $podcast->name }}</a>
            <div class="block md:hidden">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <button x-on:click="activePage = 'home'" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">{{ __("Home") }}</button>
                        <button x-on:click="activePage = 'episodes'" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">{{ __("Episodes") }}</button>
                    </x-slot>
                </x-dropdown>
            </div>
        </nav>
    </div>
    {{-- End of Navbar --}}

    {{-- Home page --}}
    <div x-show="activePage == 'home'" x-cloak class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
        <div class="flex items-center justify-between md:space-x-8">
            <div class="hidden md:block w-full">
                <h1 class="text-5xl font-semibold">{{ $podcast->name }}</h1>
                <p class="mt-4 text-lg">{{ $podcast->description }}</p>

                {{-- Podcatchers --}}
                <h3 class="mt-6 text-lg font-bold">{{ __("Listen on") }}</h3>
                @include('podcast.templates.modern.partials.podcatchers')
                {{-- End of Podcatchers --}}
            </div>
            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full md:w-2/3 object-center object-cover">
        </div>

        <div class="mt-12">
            @include('podcast.templates.modern.partials.episodes')
        </div>

    </div>
    {{-- End of Home page --}}

    {{-- Episodes --}}
    <div x-show="activePage == 'episodes'" x-cloak class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">

        <h1 class="text-4xl font-semibold">{{ __("Episodes") }}</h1>
        <div class="mt-12">
            @include('podcast.templates.modern.partials.episodes')
        </div>

        <div class="mt-6">
            {{ $episodes->links() }}
        </div>
    </div>
</div>
@endsection
