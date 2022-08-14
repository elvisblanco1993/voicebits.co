<div>
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('layouts.podcast-menu')
        <div class="mt-10 flex items-center justify-between">
            <div class="text-xl font-bold">Distribute your show</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>

        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div class="">
                <div class="">Your RSS feed</div>
                <div class="mt-2 flex items-center justify-between">
                    <span id="rss" class="px-4 py-2 border border-r-0 border-gray-200 rounded-r-none rounded-lg w-full truncate">{{ route('show.feed', ['url' => $podcast->url]) }}</span>
                    <button class="w-auto text-center text-slate-600 px-4 py-2 rounded-l-none rounded-lg border border-slate-200 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all"
                    id="rssBtn"
                    onclick="copyToClipboard()"
                    >Copy</button>
                </div>
            </div>
            <div class="py-12 border-t border-slate-200"></div>
            <div class="mt-4">
                <x-jet-label for="apple" value="Apple Podcasts"/>
                <x-jet-input id="apple" type="url" wire:model="apple" placeholder="e.g. https://podcasts.apple.com" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="spotify" value="Spotify"/>
                <x-jet-input id="spotify" type="url" wire:model="spotify" placeholder="e.g. https://www.spotify.com" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="google" value="Google Podcasts"/>
                <x-jet-input id="google" type="url" wire:model="google" placeholder="e.g. https://podcasts.google.com" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="stitcher" value="Stitcher"/>
                <x-jet-input id="stitcher" type="url" wire:model="stitcher" placeholder="e.g. https://www.stitcher.com/s?fid=1234556@refid=vbits" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="pocketcasts" value="Pocket Casts"/>
                <x-jet-input id="pocketcasts" type="url" wire:model="pocketcasts" placeholder="e.g. https://pca.st/itunes/9871234" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="amazon" value="Amazon Music"/>
                <x-jet-input id="amazon" type="url" wire:model="amazon" placeholder="e.g. https://music.amazon.com/podcasts/987654/Lorem-Ipsum" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="pandora" value="Pandora"/>
                <x-jet-input id="pandora" type="url" wire:model="pandora" placeholder="e.g. https://www.pandora.com/podcast/lorem-ipsum" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="iheartradio" value="iHeartRadio"/>
                <x-jet-input id="iheartradio" type="url" wire:model="iheartradio" placeholder="e.g. https://www.iheart.com/podcast/lorem-ipsum" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="castbox" value="Castbox"/>
                <x-jet-input id="castbox" type="url" wire:model="castbox" placeholder="e.g. https://castbox.fm/vlc/9876543" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="deezer" value="Deezer"/>
                <x-jet-input id="deezer" type="url" wire:model="deezer" placeholder="e.g. https://www.deezer.com/en-show/9873" class="mt-1 w-full truncate"/>
            </div>
            <div class="mt-8">
                <x-jet-label for="castro" value="Castro"/>
                <x-jet-input id="castro" type="url" wire:model="castro" placeholder="e.g. https://castro.fm/itunes/1234654" class="mt-1 w-full truncate"/>
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard()
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
