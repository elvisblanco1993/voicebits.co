<div>
    <div class="max-w-5xl mx-auto h-44 bg-center bg-cover" style="background-image: url('{{ asset($podcast->cover) }}') ">
        <div class="h-full flex items-center bg-slate-900/60 backdrop-blur-xl px-4 sm:px-6 lg:px-8">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-xl object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-xl bg-violet-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-10 h-auto">
                </div>
            @endif
            <h1 class="ml-6 text-3xl font-bold text-white">{{ $podcast->name }}</h1>
        </div>
    </div>
    @livewire('submenu')
    <div class="py-6">
        <div class="text-2xl font-bold">Distribute your show</div>
        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div>
                <div class="text-sm text-slate-700 font-medium">Website</div>
                <div class="mt-2 flex items-center justify-between">
                    <span id="web" class="px-4 py-2 border border-r-0 border-gray-200 rounded-r-none rounded-lg w-full truncate">{{ route('public.podcast.website', ['url' => $podcast->url]) }}</span>
                    <button class="w-auto text-center text-slate-600 px-4 py-2 rounded-l-none rounded-lg border border-slate-200 hover:text-violet-600 hover:bg-violet-50 hover:border-violet-200 transition-all"
                    id="webBtn"
                    onclick="copyWebsiteToClipboard()"
                    >Copy</button>
                </div>
            </div>
            <div class="mt-6">
                <div class="text-sm text-slate-700 font-medium">RSS Feed</div>
                <div class="mt-2 flex items-center justify-between">
                    <span id="rss" class="px-4 py-2 border border-r-0 border-gray-200 rounded-r-none rounded-lg w-full truncate">{{ route('public.podcast.feed', ['url' => $podcast->url, 'player' => 'rss']) }}</span>
                    <button class="w-auto text-center text-slate-600 px-4 py-2 rounded-l-none rounded-lg border border-slate-200 hover:text-violet-600 hover:bg-violet-50 hover:border-violet-200 transition-all"
                    id="rssBtn"
                    onclick="copyRssToClipboard()"
                    >Copy</button>
                </div>
            </div>
        </div>

        <div class="my-12"></div>

        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <p class="text-xl font-bold">Podcast Index</p>
                <p class="text-slate-600">This is one of the biggest independent podcast aggregators out there. Follow this guide to make your show available in Podcast Index. Once you publish your feed, paste the url provided by Podcast Index in the field below.</p>
                <x-input type="url" wire:model="podcastindex" class="mt-2 w-full" placeholder="https://podcastindex.org/podcast/123456789"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#4285F4]' => $google
                     ]) xmlns="http://www.w3.org/2000/svg"><title>Google Podcasts</title><path d="M1.503 9.678c-.83 0-1.5.67-1.5 1.5v1.63a1.5 1.5 0 103 0v-1.63c0-.83-.67-1.5-1.5-1.5zm20.994 0c-.83 0-1.5.67-1.5 1.5v1.63a1.5 1.5 0 103 0v-1.63c0-.83-.67-1.5-1.5-1.5zM6.68 14.587c-.83 0-1.5.67-1.5 1.5v1.63a1.5 1.5 0 103 0v-1.62c0-.83-.67-1.5-1.5-1.5zm0-9.817c-.83 0-1.5.67-1.5 1.5v5.357a1.5 1.5 0 003 0V6.258c0-.83-.67-1.5-1.5-1.5zm10.638 0c-.83 0-1.5.67-1.5 1.5v1.64a1.5 1.5 0 003 0V6.27c0-.83-.67-1.5-1.5-1.5zM12 0c-.83 0-1.5.67-1.5 1.5v1.63a1.5 1.5 0 103 0V1.5c0-.83-.67-1.499-1.5-1.499zm0 19.355c-.83 0-1.5.67-1.5 1.5v1.64a1.5 1.5 0 103 .01v-1.64c0-.82-.67-1.5-1.5-1.5zm5.319-8.457c-.83 0-1.5.68-1.5 1.5v5.328a1.5 1.5 0 003 0v-5.329c0-.83-.67-1.5-1.5-1.5zM12 6.128c-.83 0-1.5.68-1.5 1.5v8.728a1.5 1.5 0 003 0V7.638c0-.83-.67-1.5-1.5-1.5z"/></svg>
                    <p class="text-xl font-bold">Google Podcasts</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Google Podcasts. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="google" class="mt-2 w-full" placeholder="https://podcasts.google.com/feed/adasdkaslkmasdasd8dausdas0asd"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#1DB954]' => $spotify
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Spotify</title><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
                    <p class="text-xl font-bold">Spotify</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Spotify. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="spotify" class="mt-2 w-full" placeholder="https://open.spotify.com/show/123qweqweasdasd"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#9933CC]' => $apple
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Apple Podcasts</title><path d="M5.34 0A5.328 5.328 0 000 5.34v13.32A5.328 5.328 0 005.34 24h13.32A5.328 5.328 0 0024 18.66V5.34A5.328 5.328 0 0018.66 0zm6.525 2.568c2.336 0 4.448.902 6.056 2.587 1.224 1.272 1.912 2.619 2.264 4.392.12.59.12 2.2.007 2.864a8.506 8.506 0 01-3.24 5.296c-.608.46-2.096 1.261-2.336 1.261-.088 0-.096-.091-.056-.46.072-.592.144-.715.48-.856.536-.224 1.448-.874 2.008-1.435a7.644 7.644 0 002.008-3.536c.208-.824.184-2.656-.048-3.504-.728-2.696-2.928-4.792-5.624-5.352-.784-.16-2.208-.16-3 0-2.728.56-4.984 2.76-5.672 5.528-.184.752-.184 2.584 0 3.336.456 1.832 1.64 3.512 3.192 4.512.304.2.672.408.824.472.336.144.408.264.472.856.04.36.03.464-.056.464-.056 0-.464-.176-.896-.384l-.04-.03c-2.472-1.216-4.056-3.274-4.632-6.012-.144-.706-.168-2.392-.03-3.04.36-1.74 1.048-3.1 2.192-4.304 1.648-1.737 3.768-2.656 6.128-2.656zm.134 2.81c.409.004.803.04 1.106.106 2.784.62 4.76 3.408 4.376 6.174-.152 1.114-.536 2.03-1.216 2.88-.336.43-1.152 1.15-1.296 1.15-.023 0-.048-.272-.048-.603v-.605l.416-.496c1.568-1.878 1.456-4.502-.256-6.224-.664-.67-1.432-1.064-2.424-1.246-.64-.118-.776-.118-1.448-.008-1.02.167-1.81.562-2.512 1.256-1.72 1.704-1.832 4.342-.264 6.222l.413.496v.608c0 .336-.027.608-.06.608-.03 0-.264-.16-.512-.36l-.034-.011c-.832-.664-1.568-1.842-1.872-2.997-.184-.698-.184-2.024.008-2.72.504-1.878 1.888-3.335 3.808-4.019.41-.145 1.133-.22 1.814-.211zm-.13 2.99c.31 0 .62.06.844.178.488.253.888.745 1.04 1.259.464 1.578-1.208 2.96-2.72 2.254h-.015c-.712-.331-1.096-.956-1.104-1.77 0-.733.408-1.371 1.112-1.745.224-.117.534-.176.844-.176zm-.011 4.728c.988-.004 1.706.349 1.97.97.198.464.124 1.932-.218 4.302-.232 1.656-.36 2.074-.68 2.356-.44.39-1.064.498-1.656.288h-.003c-.716-.257-.87-.605-1.164-2.644-.341-2.37-.416-3.838-.218-4.302.262-.616.974-.966 1.97-.97z"/></svg>
                    <p class="text-xl font-bold">Apple Podcasts</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in iTunes and Apple Podcasts. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="apple" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#000000]' => $stitcher
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Stitcher</title><path d="M19.59 8.516H24v6.928h-4.41zM0 8.854h4.41v7.803H0zm4.914-1.328h4.388v8.572H4.914zm4.892.725h4.388v8.81H9.806zm4.892-1.312h4.388v9.158h-4.388Z"/></svg>
                    <p class="text-xl font-bold">Stitcher</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Stitcher. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="stitcher" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#F43E37]' => $pocketcasts
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Pocket Casts</title><path d="M12,0C5.372,0,0,5.372,0,12c0,6.628,5.372,12,12,12c6.628,0,12-5.372,12-12 C24,5.372,18.628,0,12,0z M15.564,12c0-1.968-1.596-3.564-3.564-3.564c-1.968,0-3.564,1.595-3.564,3.564 c0,1.968,1.595,3.564,3.564,3.564V17.6c-3.093,0-5.6-2.507-5.6-5.6c0-3.093,2.507-5.6,5.6-5.6c3.093,0,5.6,2.507,5.6,5.6H15.564z M19,12c0-3.866-3.134-7-7-7c-3.866,0-7,3.134-7,7c0,3.866,3.134,7,7,7v2.333c-5.155,0-9.333-4.179-9.333-9.333 c0-5.155,4.179-9.333,9.333-9.333c5.155,0,9.333,4.179,9.333,9.333H19z"/></svg>
                    <p class="text-xl font-bold">Pocket Casts</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Pocket Casts. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="pocketcasts" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#FF9900]' => $amazon
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Amazon</title><path d="M.045 18.02c.072-.116.187-.124.348-.022 3.636 2.11 7.594 3.166 11.87 3.166 2.852 0 5.668-.533 8.447-1.595l.315-.14c.138-.06.234-.1.293-.13.226-.088.39-.046.525.13.12.174.09.336-.12.48-.256.19-.6.41-1.006.654-1.244.743-2.64 1.316-4.185 1.726a17.617 17.617 0 01-10.951-.577 17.88 17.88 0 01-5.43-3.35c-.1-.074-.151-.15-.151-.22 0-.047.021-.09.051-.13zm6.565-6.218c0-1.005.247-1.863.743-2.577.495-.71 1.17-1.25 2.04-1.615.796-.335 1.756-.575 2.912-.72.39-.046 1.033-.103 1.92-.174v-.37c0-.93-.105-1.558-.3-1.875-.302-.43-.78-.65-1.44-.65h-.182c-.48.046-.896.196-1.246.46-.35.27-.575.63-.675 1.096-.06.3-.206.465-.435.51l-2.52-.315c-.248-.06-.372-.18-.372-.39 0-.046.007-.09.022-.15.247-1.29.855-2.25 1.82-2.88.976-.616 2.1-.975 3.39-1.05h.54c1.65 0 2.957.434 3.888 1.29.135.15.27.3.405.48.12.165.224.314.283.45.075.134.15.33.195.57.06.254.105.42.135.51.03.104.062.3.076.615.01.313.02.493.02.553v5.28c0 .376.06.72.165 1.036.105.313.21.54.315.674l.51.674c.09.136.136.256.136.36 0 .12-.06.226-.18.314-1.2 1.05-1.86 1.62-1.963 1.71-.165.135-.375.15-.63.045a6.062 6.062 0 01-.526-.496l-.31-.347a9.391 9.391 0 01-.317-.42l-.3-.435c-.81.886-1.603 1.44-2.4 1.665-.494.15-1.093.227-1.83.227-1.11 0-2.04-.343-2.76-1.034-.72-.69-1.08-1.665-1.08-2.94l-.05-.076zm3.753-.438c0 .566.14 1.02.425 1.364.285.34.675.512 1.155.512.045 0 .106-.007.195-.02.09-.016.134-.023.166-.023.614-.16 1.08-.553 1.424-1.178.165-.28.285-.58.36-.91.09-.32.12-.59.135-.8.015-.195.015-.54.015-1.005v-.54c-.84 0-1.484.06-1.92.18-1.275.36-1.92 1.17-1.92 2.43l-.035-.02zm9.162 7.027c.03-.06.075-.11.132-.17.362-.243.714-.41 1.05-.5a8.094 8.094 0 011.612-.24c.14-.012.28 0 .41.03.65.06 1.05.168 1.172.33.063.09.099.228.099.39v.15c0 .51-.149 1.11-.424 1.8-.278.69-.664 1.248-1.156 1.68-.073.06-.14.09-.197.09-.03 0-.06 0-.09-.012-.09-.044-.107-.12-.064-.24.54-1.26.806-2.143.806-2.64 0-.15-.03-.27-.087-.344-.145-.166-.55-.257-1.224-.257-.243 0-.533.016-.87.046-.363.045-.7.09-1 .135-.09 0-.148-.014-.18-.044-.03-.03-.036-.047-.02-.077 0-.017.006-.03.02-.063v-.06z"/></svg>
                    <p class="text-xl font-bold">Amazon Music</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Amazon Music. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="amazon" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#224099]' => $pandora
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Pandora</title><path d="M1.882 0v24H8.32a1.085 1.085 0 001.085-1.085v-4.61h1.612c7.88 0 11.103-4.442 11.103-9.636C22.119 2.257 17.247 0 12.662 0H1.882Z"/></svg>
                    <p class="text-xl font-bold">Pandora</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Pandora. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="pandora" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#C6002B]' => $iheartradio
                    ]) xmlns="http://www.w3.org/2000/svg"><title>iHeartRadio</title><path d="M4.403 21.983c.597 0 1.023-.306 1.023-.817v-.012c0-.489-.375-.784-1.017-.784H3.182v1.613zm-1.67-1.8c0-.125.102-.228.221-.228h1.489c.488 0 .88.148 1.13.398.193.193.307.472.307.784v.011c0 .654-.443 1.034-1.062 1.154l.988 1.272c.046.051.074.102.074.164 0 .12-.114.222-.227.222-.091 0-.16-.05-.21-.12l-1.12-1.453H3.183v1.346a.228.228 0 01-.228.227.227.227 0 01-.221-.227v-3.55m6.674 2.29l-.914-2.035-.915 2.034zm-2.812 1.164l1.614-3.528c.056-.125.142-.2.284-.2h.022c.137 0 .228.075.279.2l1.613 3.522a.31.31 0 01.029.113c0 .12-.097.216-.216.216-.108 0-.182-.074-.222-.165l-.415-.914H7.402l-.415.926c-.04.097-.113.153-.216.153a.204.204 0 01-.204-.204.26.26 0 01.028-.12m6.078-.118c1.005 0 1.647-.682 1.647-1.563v-.011c0-.88-.642-1.574-1.647-1.574h-.932v3.148zm-1.38-3.335c0-.125.102-.228.221-.228h1.16c1.249 0 2.112.858 2.112 1.977v.012c0 1.119-.863 1.988-2.113 1.988h-1.159a.226.226 0 01-.221-.227v-3.522m4.481-.029c0-.124.103-.227.222-.227.125 0 .227.103.227.227v3.579a.228.228 0 01-.227.227.227.227 0 01-.222-.227v-3.579m5.027 1.801v-.011c0-.904-.659-1.642-1.568-1.642s-1.556.727-1.556 1.63v.012c0 .903.659 1.642 1.567 1.642.91 0 1.557-.728 1.557-1.631zm-3.59 0v-.011c0-1.097.824-2.057 2.033-2.057 1.21 0 2.023.949 2.023 2.045v.012c0 1.096-.824 2.056-2.034 2.056s-2.022-.949-2.022-2.045m2.03-17.192c0 1.397-.754 2.773-2.242 4.092a.345.345 0 01-.458-.517c1.333-1.182 2.01-2.385 2.01-3.575v-.016c0-.966-.606-2.103-1.38-2.588a.345.345 0 11.367-.586c.97.61 1.703 1.974 1.703 3.174zM14.76 7.677a.345.345 0 11-.337-.602c.799-.448 1.336-1.318 1.339-2.167a2.096 2.096 0 00-1.124-1.855.345.345 0 11.321-.611 2.785 2.785 0 011.493 2.46v.011c-.004 1.09-.683 2.199-1.692 2.764zm-2.772-1.015a1.498 1.498 0 11.001-2.997 1.498 1.498 0 01-.001 2.997zm-2.303.882a.345.345 0 01-.47.133c-1.009-.565-1.688-1.674-1.692-2.764v-.01a2.785 2.785 0 011.493-2.461.346.346 0 01.321.611 2.096 2.096 0 00-1.124 1.855c.003.849.54 1.719 1.34 2.166a.345.345 0 01.132.47zM7.464 8.825a.344.344 0 01-.488.03C5.49 7.536 4.734 6.16 4.734 4.763v-.016c0-1.2.732-2.564 1.703-3.174a.346.346 0 01.367.586c-.774.485-1.38 1.622-1.38 2.588v.016c0 1.19.677 2.393 2.01 3.575a.345.345 0 01.03.487zM16.152 0c-1.727 0-3.27.915-4.164 2.252C11.094.915 9.55 0 7.823 0A4.982 4.982 0 002.84 4.983c0 1.746 1.106 3.005 2.261 4.17l4.518 4.272a.371.371 0 00.626-.27V9.827c0-.963.78-1.743 1.743-1.745a1.745 1.745 0 011.742 1.745v3.328c0 .326.39.493.626.27l4.518-4.272c1.155-1.165 2.261-2.424 2.261-4.17A4.982 4.982 0 0016.152 0M4.582 14.766h1.194v1.612h1.532v-1.612H8.5v4.307H7.308v-1.637H5.776v1.637H4.582v-4.307m6.527 2.353a.563.563 0 00-.578-.587c-.308 0-.55.238-.578.587zm-2.264.305v-.012c0-.972.696-1.741 1.68-1.741 1.15 0 1.68.842 1.68 1.82 0 .075 0 .16-.007.24H9.971c.093.364.357.549.72.549.277 0 .498-.105.738-.34l.647.536c-.32.406-.782.677-1.447.677-1.045 0-1.784-.695-1.784-1.729m7.29-1.68h1.17v.67c.19-.454.498-.75 1.051-.725v1.23h-.098c-.609 0-.954.351-.954 1.12v1.034h-1.168v-3.329m2.95 2.295v-1.353h-.393v-.942h.393v-.842h1.17v.842h.775v.942h-.775v1.126c0 .234.105.332.32.332.153 0 .301-.043.442-.11v.916c-.209.117-.485.19-.812.19-.7 0-1.12-.307-1.12-1.1m-15.65-3.584a.62.62 0 100 1.24.62.62 0 000-1.24m10.502 3.952c-.303.013-.483-.161-.483-.371 0-.203.16-.307.454-.307h.667v.036c-.004.137-.06.617-.638.642zm1.746-1.008c0-1.033-.739-1.729-1.784-1.729-.665 0-1.126.271-1.447.677l.647.536c.24-.234.461-.34.738-.34.359 0 .621.182.716.537l.001.025-.77.003c-.956.013-1.458.37-1.458 1.045 0 .65.464.999 1.262.999.432 0 .764-.17.987-.401v.32h1.106v-1.628l.002-.032V17.4M3.458 15.99h-.043a.61.61 0 00-.61.61v2.474h1.263v-2.474a.61.61 0 00-.61-.61"/></svg>
                    <p class="text-xl font-bold">iHeartRadio</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in iHeartRadio. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="iheartradio" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#F55B23]' => $castbox
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Castbox</title><path d="M12 0c-.29 0-.58.068-.812.206L2.417 5.392c-.46.272-.804.875-.804 1.408v10.4c0 .533.344 1.135.804 1.407l8.77 5.187c.465.275 1.162.275 1.626 0l8.77-5.187c.46-.272.804-.874.804-1.407V6.8c0-.533-.344-1.136-.804-1.408L12.813.206A1.618 1.618 0 0012 0zm-.85 8.304c.394 0 .714.303.714.676v2.224c0 .207.191.375.427.375s.428-.168.428-.375V9.57c0-.373.32-.675.713-.675.394 0 .712.302.712.675v4.713c0 .374-.318.676-.712.676-.394 0-.713-.302-.713-.676v-1.31c0-.206-.192-.374-.428-.374s-.427.168-.427.374v1.226c0 .374-.32.676-.713.676-.394 0-.713-.302-.713-.676v-1.667c0-.207-.192-.375-.428-.375-.235 0-.427.168-.427.375v3.31c0 .373-.319.676-.712.676-.394 0-.713-.303-.713-.676v-2.427c0-.206-.191-.374-.428-.374-.235 0-.427.168-.427.374v.178a.71.71 0 01-.712.708.71.71 0 01-.713-.708v-2.123a.71.71 0 01.713-.708.71.71 0 01.712.708v.178c0 .206.192.373.427.373.237 0 .428-.167.428-.373v-1.53c0-.374.32-.676.713-.676.393 0 .712.303.712.676v.646c0 .206.192.374.427.374.236 0 .428-.168.428-.374V8.98c0-.373.319-.676.713-.676zm4.562 2.416c.393 0 .713.302.713.676v2.691c0 .374-.32.676-.713.676-.394 0-.712-.303-.712-.676v-2.691c0-.374.319-.676.712-.676zm2.28 1.368c.395 0 .713.303.713.676v.67c0 .374-.318.676-.712.676-.394 0-.713-.302-.713-.675v-.67c0-.374.32-.677.713-.677Z"/></svg>
                    <p class="text-xl font-bold">Castbox</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Castbox. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="castbox" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#F4842D]' => $podcastaddict
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Podcast Addict</title><path d="M5.36.037C2.41.037 0 2.447 0 5.397v13.207c0 2.95 2.41 5.36 5.36 5.36h13.28c2.945 0 5.36-2.41 5.36-5.36V5.396c0-2.95-2.415-5.36-5.36-5.36zm6.585 4.285a7.72 7.72 0 017.717 7.544l.005 7.896h-3.39v-1.326a7.68 7.68 0 01-4.327 1.326 7.777 7.777 0 01-2.384-.378v-4.63a3.647 3.647 0 002.416.91 3.666 3.666 0 003.599-2.97h-1.284a2.416 2.416 0 01-4.73-.66v-.031c0-1.095.728-2.023 1.728-2.316V8.403a3.67 3.67 0 00-2.975 3.6v6.852a7.72 7.72 0 013.625-14.533zm.031 1.87V7.43h.006a4.575 4.575 0 014.573 4.574v.01h1.237v-.01a5.81 5.81 0 00-5.81-5.81zm0 2.149v1.246h.006a2.413 2.413 0 012.415 2.416v.01h1.247v-.01a3.662 3.662 0 00-3.662-3.662zm0 2.252c-.78 0-1.409.629-1.409 1.41 0 .78.629 1.409 1.41 1.409.78 0 1.409-.629 1.409-1.41 0-.78-.629-1.409-1.41-1.409z"/></svg>
                    <p class="text-xl font-bold">Podcast Addict</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Podcast Addict. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="podcastaddict" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#FEAA2D]' => $deezer
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Deezer</title><path d="M18.81 4.16v3.03H24V4.16h-5.19zM6.27 8.38v3.027h5.189V8.38h-5.19zm12.54 0v3.027H24V8.38h-5.19zM6.27 12.594v3.027h5.189v-3.027h-5.19zm6.271 0v3.027h5.19v-3.027h-5.19zm6.27 0v3.027H24v-3.027h-5.19zM0 16.81v3.029h5.19v-3.03H0zm6.27 0v3.029h5.189v-3.03h-5.19zm6.271 0v3.029h5.19v-3.03h-5.19zm6.27 0v3.029H24v-3.03h-5.19Z"/></svg>
                    <p class="text-xl font-bold">Deezer</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Deezer. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="deezer" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <svg role="img" viewBox="0 0 24 24" @class([
                        'w-8 h-8',
                        'fill-[#00B265]' => $castro
                    ]) xmlns="http://www.w3.org/2000/svg"><title>Castro</title><path d="M12 0C5.372 0 0 5.373 0 12s5.372 12 12 12c6.627 0 12-5.373 12-12S18.627 0 12 0zm-.002 13.991a2.052 2.052 0 1 1 0-4.105 2.052 2.052 0 0 1 0 4.105zm4.995 4.853l-2.012-2.791a5.084 5.084 0 1 0-5.982.012l-2.014 2.793A8.526 8.526 0 0 1 11.979 3.42a8.526 8.526 0 0 1 8.526 8.526 8.511 8.511 0 0 1-3.512 6.898z"/></svg>
                    <p class="text-xl font-bold">Castro</p>
                </div>
                <p class="mt-2 text-slate-600">Follow this guide to make your show available in Castro. Once you publish your feed, paste the url provided in the field below.</p>
                <x-input type="url" wire:model="castro" class="mt-2 w-full" placeholder="https://podcasts.apple.com/us/podcast/your-awesome-podcast"/>
            </div>
            <div class="px-8 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>
    </div>

    <script>
        function copyWebsiteToClipboard()
        {
            var source = document.getElementById("web");
            navigator.clipboard.writeText(source.innerText);
            document.getElementById("webBtn").innerText = "Copied";
            setTimeout(function(){
                document.getElementById("webBtn").innerText = "Copy";
            }, 3000);
        }
        function copyRssToClipboard()
        {
            var source = document.getElementById("rss");
            navigator.clipboard.writeText(source.innerText);
            document.getElementById("rssBtn").innerText = "Copied";
            setTimeout(function(){
                document.getElementById("rssBtn").innerText = "Copy";
            }, 3000);
        }
    </script>
</div>
