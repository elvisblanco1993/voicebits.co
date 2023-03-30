<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $podcast->name . ' | ' . config('app.name', 'Laravel') }}</title>

        @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fira-sans:100,200,300,400,500,600,700,800,900|inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        @livewireStyles

        {{-- Used-defined styles --}}
        <style>
            * {
                font-family: 'Fira Sans', sans-serif;
            }
        </style>

        {{-- Scripts --}}
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </head>
    <body x-data="{
        activePage: '',
        init(){
            if(localStorage.getItem('active') === null) {
                localStorage.setItem('active', 'home');
                $data.activePage = 'home';
            } else {
                $data.activePage = localStorage.getItem('active');
            }

            this.$watch('activePage', ()=>{
                console.log($data.activePage);
                localStorage.setItem('active', $data.activePage);
            });
        }
    }" class="antialiased min-h-screen">
        {{-- Slim player --}}
        @livewire('player.slim')
        {{-- End of Slim player --}}
        {{-- Navbar --}}
        <div class="w-full">
            <nav class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                {{-- About --}}
                <div class="hidden md:flex items-center space-x-12">
                    <button x-on:click="activePage = 'home'">{{ __("Home") }}</button>
                    <button x-on:click="activePage = 'episodes'">{{ __("Episodes") }}</button>
                </div>

                <div class="">
                    <a href="{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M3.75 3a.75.75 0 00-.75.75v.5c0 .414.336.75.75.75H4c6.075 0 11 4.925 11 11v.25c0 .414.336.75.75.75h.5a.75.75 0 00.75-.75V16C17 8.82 11.18 3 4 3h-.25z" />
                            <path d="M3 8.75A.75.75 0 013.75 8H4a8 8 0 018 8v.25a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75V16a6 6 0 00-6-6h-.25A.75.75 0 013 9.25v-.5zM7 15a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>
                </div>

                {{-- Mobile menu --}}
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
        <div x-show="activePage == 'home'" x-cloak class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
            <div class="flex items-center justify-between">
                <div class="hidden md:block w-full">
                    <h1 class="text-5xl font-semibold">{{ $podcast->name }}</h1>
                    <p class="mt-6 text-lg">{{ $podcast->description }}</p>
                </div>
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full md:w-1/2 object-center object-cover">
            </div>
        </div>
        {{-- End of Home page --}}

        {{-- Episodes --}}
        <div x-show="activePage == 'episodes'" x-cloak class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
            @forelse ($podcast->episodes as $episode)
                <article class="mb-4 w-full py-4">
                    <div class="grid grid-cols-12 items-center gap-8">
                        <div class="col-span-2 lg:col-span-1 w-full flex items-center justify-center">
                            <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="episode-btn text-slate-800 hover:text-slate-600 transition-all p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="h-full col-span-10 lg:col-span-11 flex items-center justify-between">
                            <div>
                                <a href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}" class="hover:underline transition-all">
                                    <h2 class="text-xl font-bold text-slate-800">{{ $episode->title }}</h2>
                                </a>
                                <span class="mt-1 text-sm text-slate-600">{!! strip_tags(Str::limit($episode->description, 80, ' [...]')) !!}</span>
                            </div>
                            <div class="hidden h-full text-xs text-slate-500 md:flex flex-col justify-between items-end">
                                <p>{{ Carbon\Carbon::parse($episode->published_at)->format('M d, Y') }}</p>
                                <p>{{ ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</p>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
            @endforelse
        </div>
        {{-- End of Episodes --}}
        @livewireScripts
    </body>
</html>
