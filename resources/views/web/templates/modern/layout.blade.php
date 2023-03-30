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
                localStorage.setItem('active', $data.activePage);
            });
        }
    }" class="antialiased min-h-screen">
        {{-- Slim player --}}
        @livewire('player.slim')
        {{-- End of Slim player --}}
        {{-- Navbar --}}
        <div class="w-full">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                {{-- About --}}
                <div class="hidden md:flex items-center space-x-12">
                    <button x-on:click="activePage = 'home'" :class="activePage == 'home' ? 'border-b-4 border-b-slate-900' : '' ">{{ __("Home") }}</button>
                    <button x-on:click="activePage = 'episodes'" :class="activePage == 'episodes' ? 'border-b-4 border-b-slate-900' : '' ">{{ __("Episodes") }}</button>
                </div>

                <div class="hidden md:flex items-center space-x-3">
                    @if ($podcast->twitter)
                        <a href="{{ $podcast->twitter . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#1DA1F2]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->instagram)
                        <a href="{{ $podcast->instagram . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#E4405F]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->facebook)
                        <a href="{{ $podcast->facebook . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#1877F2]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->linkedin)
                        <a href="{{ $podcast->linkedin . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#0A66C2]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->pinterest)
                        <a href="{{ $podcast->pinterest . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#BD081C]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Pinterest</title><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->youtube)
                        <a href="{{ $podcast->youtube . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#FF0000]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->vimeo)
                        <a href="{{ $podcast->vimeo . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-[#1AB7EA]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Vimeo</title><path d="M23.9765 6.4168c-.105 2.338-1.739 5.5429-4.894 9.6088-3.2679 4.247-6.0258 6.3699-8.2898 6.3699-1.409 0-2.578-1.294-3.553-3.881l-1.9179-7.1138c-.719-2.584-1.488-3.878-2.312-3.878-.179 0-.806.378-1.8809 1.132l-1.129-1.457a315.06 315.06 0 003.501-3.1279c1.579-1.368 2.765-2.085 3.5539-2.159 1.867-.18 3.016 1.1 3.447 3.838.465 2.953.789 4.789.971 5.5069.5389 2.45 1.1309 3.674 1.7759 3.674.502 0 1.256-.796 2.265-2.385 1.004-1.589 1.54-2.797 1.612-3.628.144-1.371-.395-2.061-1.614-2.061-.574 0-1.167.121-1.777.391 1.186-3.8679 3.434-5.7568 6.7619-5.6368 2.4729.06 3.6279 1.664 3.4929 4.7969z"/></svg>
                        </a>
                    @endif
                    @if ($podcast->medium)
                        <a href="{{ $podcast->medium . '?utm_referrer=' . $podcast->url }}" target="_blank">
                            <svg class="w-5 h-5 fill-black" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Medium</title><path d="M13.54 12a6.8 6.8 0 01-6.77 6.82A6.8 6.8 0 010 12a6.8 6.8 0 016.77-6.82A6.8 6.8 0 0113.54 12zM20.96 12c0 3.54-1.51 6.42-3.38 6.42-1.87 0-3.39-2.88-3.39-6.42s1.52-6.42 3.39-6.42 3.38 2.88 3.38 6.42M24 12c0 3.17-.53 5.75-1.19 5.75-.66 0-1.19-2.58-1.19-5.75s.53-5.75 1.19-5.75C23.47 6.25 24 8.83 24 12z"/></svg>
                        </a>
                    @endif
                    <a href="{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}" target="_blank">
                        <svg class="w-5 h-5 fill-[#FFA500]" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>RSS</title><path d="M19.199 24C19.199 13.467 10.533 4.8 0 4.8V0c13.165 0 24 10.835 24 24h-4.801zM3.291 17.415c1.814 0 3.293 1.479 3.293 3.295 0 1.813-1.485 3.29-3.301 3.29C1.47 24 0 22.526 0 20.71s1.475-3.294 3.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727 0 15.909 7.184 15.909 15.91z"/></svg>
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
        <div x-show="activePage == 'home'" x-cloak class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
            <div class="flex items-center justify-between space-x-8">
                <div class="hidden md:block w-full">
                    <h1 class="text-5xl font-semibold">{{ $podcast->name }}</h1>
                    <p class="mt-4 text-lg">{{ $podcast->description }}</p>

                    {{-- Podcatchers --}}
                    <h3 class="mt-6 text-lg font-bold">{{ __("Listen on") }}</h3>
                    <div class="mt-2 space-y-3">
                        @if ($podcast->podcastindex)
                            <a href="{{ $podcast->podcastindex }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-red-500 transition-all">
                                <span>{{ __("Podcast Index") }}</span>
                            </a>
                        @endif
                        @if ($podcast->google)
                            <a href="{{ $podcast->google }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-blue-400 transition-all">
                                <span>{{ __("Google Podcasts") }}</span>
                            </a>
                        @endif
                        @if ($podcast->spotify)
                            <a href="{{ $podcast->spotify }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-green-400 transition-all">
                                <span>{{ __("Spotify") }}</span>
                            </a>
                        @endif
                        @if ($podcast->apple)
                            <a href="{{ $podcast->apple }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#9933CC] transition-all">
                                <span>{{ __("Apple Podcasts") }}</span>
                            </a>
                        @endif
                        @if ($podcast->stitcher)
                            <a href="{{ $podcast->stitcher }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-black transition-all">
                                <span>{{ __("Stitcher") }}</span>
                            </a>
                        @endif
                        @if ($podcast->pocketcasts)
                            <a href="{{ $podcast->pocketcasts }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#F43E37] transition-all">
                                <span>{{ __("Pocket Casts") }}</span>
                            </a>
                        @endif
                        @if ($podcast->amazon)
                            <a href="{{ $podcast->amazon }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#FF9900] transition-all">
                                <span>{{ __("Amazon Music") }}</span>
                            </a>
                        @endif
                        @if ($podcast->pandora)
                            <a href="{{ $podcast->pandora }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#224099] transition-all">
                                <span>{{ __("Pandora") }}</span>
                            </a>
                        @endif
                        @if ($podcast->iheartradio)
                            <a href="{{ $podcast->iheartradio }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#C6002B] transition-all">
                                <span>{{ __("iHeartRadio") }}</span>
                            </a>
                        @endif
                        @if ($podcast->castbox)
                            <a href="{{ $podcast->castbox }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#F55B23] transition-all">
                                <span>{{ __("Castbox") }}</span>
                            </a>
                        @endif
                        @if ($podcast->podcastaddict)
                            <a href="{{ $podcast->podcastaddict }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#F4842D] transition-all">
                                <span>{{ __("Podcast Addict") }}</span>
                            </a>
                        @endif
                        @if ($podcast->deezer)
                            <a href="{{ $podcast->deezer }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#FEAA2D] transition-all">
                                <span>{{ __("Deezer") }}</span>
                            </a>
                        @endif
                        @if ($podcast->castro)
                            <a href="{{ $podcast->castro }}" target="_blank" class="mr-2 inline-block whitespace-nowrap px-4 py-2 border rounded-lg text-sm text-slate-600 hover:border-[#00B265] transition-all">
                                <span>{{ __("Castro") }}</span>
                            </a>
                        @endif
                    </div>
                    {{-- End of Podcatchers --}}
                </div>
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full md:w-2/3 object-center object-cover">
            </div>
        </div>
        {{-- End of Home page --}}

        {{-- Episodes --}}
        <div x-show="activePage == 'episodes'" x-cloak class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
            <h1 class="mb-12 text-4xl font-semibold">{{ __("Episodes") }}</h1>
            @forelse ($podcast->episodes as $episode)
                <article class="mb-4 w-full p-4 border rounded-xl">
                    <div class="grid grid-cols-12 items-center gap-4">
                        <div class="col-span-10 lg:col-span-11 w-full flex items-center">
                            <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="episode-btn text-slate-800 hover:text-slate-600 transition-all p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div class="ml-6">
                                <a href="{{ route('public.podcast.episode', ['url' => $podcast->url, 'episode' => $episode->guid]) }}" class="hover:underline transition-all">
                                    <h2 class="text-xl font-bold text-slate-800">{{ $episode->title }}</h2>
                                </a>
                                <span class="mt-1 text-sm text-slate-600">{!! strip_tags(Str::limit($episode->description, 80, ' [...]')) !!}</span>
                            </div>
                        </div>
                        <div class="h-full col-span-2 lg:col-span-1 flex items-center justify-between">
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
