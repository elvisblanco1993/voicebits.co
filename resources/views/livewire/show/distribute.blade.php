<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        @include('layouts.podcast-menu')
        <div class="mt-10 flex items-center justify-between">
            <div class="text-xl font-bold">Distribute your show</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>

        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div class="">
                <div class="font-semibold">Website</div>
                <div class="mt-2 flex items-center justify-between">
                    <span id="web" class="px-4 py-2 border border-r-0 border-gray-200 rounded-r-none rounded-lg w-full truncate">{{ route('podcast.website', ['url' => $podcast->url]) }}</span>
                    <button class="w-auto text-center text-slate-600 px-4 py-2 rounded-l-none rounded-lg border border-slate-200 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all"
                    id="webBtn"
                    onclick="copyWebsiteToClipboard()"
                    >Copy</button>
                </div>
            </div>
            <div class="mt-8">
                <div class="font-semibold">RSS Feed</div>
                <div class="mt-2 flex items-center justify-between">
                    <span id="rss" class="px-4 py-2 border border-r-0 border-gray-200 rounded-r-none rounded-lg w-full truncate">{{ route('show.feed', ['url' => $podcast->url, 'player' => 'rss']) }}</span>
                    <button class="w-auto text-center text-slate-600 px-4 py-2 rounded-l-none rounded-lg border border-slate-200 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all"
                    id="rssBtn"
                    onclick="copyRssToClipboard()"
                    >Copy</button>
                </div>
            </div>
            <div class="my-12 border-t border-slate-200"></div>
            <div class="font-semibold">Third Party Podcatchers</div>
            <p>Here you can add all the places where you are distributing your show. If you need help distributing your podcast, <a href="/blog/distribution-guide" class="underline text-blue-600">follow this guide</a>.</p>
            <div class="mt-8">
                <label for="podcastindex" class="flex items-center space-x-2">
                    @if ($podcast->podcastindex)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Podcast Index</span>
                </label>
                <x-jet-input id="podcastindex" type="url" wire:model="podcastindex" placeholder="e.g. https://podcastindex.org" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->podcastindex
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'podcastindex']) }}</span>
            </div>

            <div class="mt-8">
                <label for="spotify" class="flex items-center space-x-2">
                    @if ($podcast->spotify)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Spotify</span>
                </label>
                <x-jet-input id="spotify" type="url" wire:model="spotify" placeholder="e.g. https://www.spotify.com" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->spotify
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'spotify']) }}</span>
            </div>
            <div class="mt-8">
                <label for="google" class="flex items-center space-x-2">
                    @if ($podcast->google)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Google Podcasts</span>
                </label>
                <x-jet-input id="google" type="url" wire:model="google" placeholder="e.g. https://podcasts.google.com" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->google
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'google-podcasts']) }}</span>
            </div>
            <div class="mt-8">
                <label for="stitcher" class="flex items-center space-x-2">
                    @if ($podcast->stitcher)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Stitcher</span>
                </label>
                <x-jet-input id="stitcher" type="url" wire:model="stitcher" placeholder="e.g. https://www.stitcher.com/s?fid=1234556@refid=vbits" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->stitcher
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'stitcher']) }}</span>
            </div>
            <div class="mt-8">
                <label for="pocketcasts" class="flex items-center space-x-2">
                    @if ($podcast->pocketcasts)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Pocket Casts</span>
                </label>
                <x-jet-input id="pocketcasts" type="url" wire:model="pocketcasts" placeholder="e.g. https://pca.st/itunes/9871234" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->pocketcasts
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'pocketcasts']) }}</span>
            </div>
            <div class="mt-8">
                <label for="amazon" class="flex items-center space-x-2">
                    @if ($podcast->amazon)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Amazon Music / Audible</span>
                </label>
                <x-jet-input id="amazon" type="url" wire:model="amazon" placeholder="e.g. https://music.amazon.com/podcasts/987654/Lorem-Ipsum" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->amazon
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'amazon-music']) }}</span>
            </div>
            <div class="mt-8">
                <label for="pandora" class="flex items-center space-x-2">
                    @if ($podcast->pandora)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Pandora</span>
                </label>
                <x-jet-input id="pandora" type="url" wire:model="pandora" placeholder="e.g. https://www.pandora.com/podcast/lorem-ipsum" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->pandora
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'pandora']) }}</span>
            </div>
            <div class="mt-8">
                <label for="iheartradio" class="flex items-center space-x-2">
                    @if ($podcast->iheartradio)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">iHeartRadio</span>
                </label>
                <x-jet-input id="iheartradio" type="url" wire:model="iheartradio" placeholder="e.g. https://www.iheart.com/podcast/lorem-ipsum" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->iheartradio
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'iheartradio']) }}</span>
            </div>
            <div class="mt-8">
                <label for="castbox" class="flex items-center space-x-2">
                    @if ($podcast->castbox)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Castbox</span>
                </label>
                <x-jet-input id="castbox" type="url" wire:model="castbox" placeholder="e.g. https://castbox.fm/vlc/9876543" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->castbox
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'castbox']) }}</span>
            </div>
            <div class="mt-8">
                <label for="deezer" class="flex items-center space-x-2">
                    @if ($podcast->deezer)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Deezer</span>
                </label>
                <x-jet-input id="deezer" type="url" wire:model="deezer" placeholder="e.g. https://www.deezer.com/en-show/9873" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->deezer
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'deezer']) }}</span>
            </div>
            <div class="mt-8">
                <label for="castro" class="flex items-center space-x-2">
                    @if ($podcast->castro)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <span class="block font-medium text-sm text-gray-700">Castro</span>
                </label>
                <x-jet-input id="castro" type="url" wire:model="castro" placeholder="e.g. https://castro.fm/itunes/1234654" class="mt-1 w-full truncate"/>
                <span @class([
                    'text-sm',
                    'text-slate-400' => $podcast->castro
                ])>{{ route('show.feed', ['url' => $podcast->url, 'player' => 'castro']) }}</span>
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
