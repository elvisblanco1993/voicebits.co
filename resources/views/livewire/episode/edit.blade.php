<div>
    @livewire('submenu')
    <div class="py-6">
        <div class="flex items-center space-x-3">
            <a href="{{ route('podcast.episodes') }}" class="hover:text-amber-600 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg>
            </a>
            <div class="text-2xl font-bold">Editing episode</div>
        </div>
        <div class="mt-4 w-full bg-white rounded-lg shadow">
            <div class="p-6">
                {{-- Content --}}
                <audio class="block mb-6 w-full rounded-full" controls src="{{ $currentEpisodeAudioTrack }}" preload></audio>
                @if ($track)
                    <div class="mb-6 flex items-center justify-between w-full px-3 py-2.5 text-sm rounded-full bg-emerald-50">
                        <div class="flex items-center space-x-3">
                            <div class="h-8 w-8 flex-none flex items-center justify-center rounded-full bg-emerald-300 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M7 4a3 3 0 016 0v6a3 3 0 11-6 0V4z" />
                                    <path d="M5.5 9.643a.75.75 0 00-1.5 0V10c0 3.06 2.29 5.585 5.25 5.954V17.5h-1.5a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-1.5v-1.546A6.001 6.001 0 0016 10v-.357a.75.75 0 00-1.5 0V10a4.5 4.5 0 01-9 0v-.357z" />
                                </svg>
                            </div>
                            <div>
                                {{ $track->getClientOriginalName() }}
                            </div>
                        </div>
                        <button class="text-red-500" wire:click="deleteTemporaryTrack">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                @endif

                <input type="file" accept="audio/mpeg" class="sr-only" wire:model.live="track" id="file-upload" />
                <label for="file-upload" class="inline-flex items-center space-x-3 px-5 py-2.5 text-sm font-normal text-black cursor-pointer bg-yellow-300 hover:bg-yellow-400 transition-all rounded-full">
                    <span>Replace Episode</span>
                    <svg wire:loading.delay wire:loading.class="inline-block" wire:target="track" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="hidden w-5 h-5 animate-spin">
                        <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
                    </svg>
                </label>
                <p class="mt-1 text-xs text-slate-600">Supported formats: .mp3 or .m4a up to 200 megabytes.</p>

                <div class="mt-6">
                    <x-label for="title">Episode title <span class="text-red-500">*</span></x-label>
                    <x-input type="text" wire:model.live="title" id="title" placeholder="What do you want to call this episode?" class="mt-1 w-full"/>
                    <x-input-error for="title" class="mt-2 text-sm text-red-600"/>
                </div>
                <div class="mt-6">
                    <x-label for="description">Description <span class="text-red-500">*</span></x-label>
                    <textarea wire:model.live="description" id="description" rows="6" class="input"></textarea>
                    <x-input-error for="description" class="mt-2 text-sm text-red-600"/>
                </div>

                <div class="mt-6">
                    <label class="block">
                        <span class="block font-medium text-sm text-gray-700">Upload transcript</span>
                        <input type="file" accept="text/plain" wire:model.live="transcript" class="mt-1 block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-amber-50 file:text-amber-700
                          hover:file:bg-amber-100
                          cursor-pointer
                        "/>
                    </label>
                    <p class="mt-3 text-xs text-slate-600">Upload the episode transcript in .txt format.</p>
                    <x-input-error for="transcript" />
                </div>

                <div class="mt-6 border-t border-dashed border-slate-200"></div>

                <div class="mt-6">
                    <x-label for="published_at">Episode release date & time</x-label>
                    <div class="flex items-center space-x-4">
                        <div>
                            <x-input type="datetime-local" wire:model.live="published_at" id="published_at" class="mt-1"/>
                        </div>
                        <x-label for="publish-now" class="flex items-center space-x-2">
                            <x-checkbox id="publish-now" wire:model.live="publish_now"/>
                            <span>Publish Now</span>
                        </x-label>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-8">
                    <div class="">
                        <x-label for="season" value="Season number"/>
                        <x-input type="number" id="season" wire:model="season" class="mt-1 w-full"/>
                    </div>
                    <div class="">
                        <x-label for="number" value="Episode number"/>
                        <x-input type="number" id="number" wire:model="number" class="mt-1 w-full"/>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-8">
                    <div class="">
                        <x-label for="type" value="Episode type"/>
                        <select wire:model.live="type" id="type" required
                            class="border-slate-200 focus:ring focus:ring-amber-100 focus:outline-none rounded-md block outline-none focus:border-amber-200 mt-1 w-full">
                            <option disabled>Select an option</option>
                            <option value="full">Full episode</option>
                            <option value="trailer">Trailer</option>
                            <option value="bonus">Bonus</option>
                        </select>
                    </div>

                    <div class="">
                        <x-label for="type" value="Content type"/>
                        <select wire:model.live="explicit" id="type" required
                            class="border-slate-200 focus:ring focus:ring-amber-100 focus:outline-none rounded-md block outline-none focus:border-amber-200 mt-1 w-full">
                            <option disabled>Select an option</option>
                            <option value="false">Clean</option>
                            <option value="true">Explicit</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <x-label value="Feed status"/>
                    <div class="mt-1">
                        <label for="public" class="flex items-center gap-2 text-sm">
                            <input id="public" type="radio" wire:model.live="blocked" name="blocked" value="false"/>
                            <span>Public on podcatchers</span>
                        </label>
                        <label for="hidden" class="mt-1 flex items-center gap-2 text-sm">
                            <input id="hidden" type="radio" wire:model.live="blocked" name="blocked" value="true"/>
                            <span>Hidden on podcatchers</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6 border-t border-dashed border-slate-200"></div>

                <div class="mt-6 grid grid-cols-6 gap-8 items-center">
                    <div class="col-span-2 md:col-span-1">
                        @if ($episode->cover && !$cover)
                            <img src="{{ Storage::url($episode->cover) }}" class="w-full rounded-lg shadow aspect-square object-center object-cover">
                        @elseif($cover)
                            <img src="{{ $cover->temporaryUrl() }}" class="w-full rounded-lg shadow aspect-square object-center object-cover">
                        @else
                            <div class="flex-none w-full h-full aspect-square rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="col-span-6 md:col-span-5">
                        <label class="block">
                            <span class="block font-medium text-sm text-gray-700">Choose episode artwork</span>
                            <input type="file" accept=".png,.jpeg" wire:model.live="cover" class="mt-1 block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-amber-50 file:text-amber-700
                              hover:file:bg-amber-100
                              cursor-pointer
                            "/>
                        </label>
                        <p class="mt-3 text-xs text-slate-600">Supported format: .png or .jpeg up to 3MB. Optimal resolution is 3000x3000px.</p>
                        <x-input-error for="cover" />
                    </div>
                </div>

                <div class="mt-6 border-t border-dashed border-slate-200"></div>

                <div class="mt-6">
                    <div class="flex items-center justify-between">
                        <label for="embed" class="block font-medium text-sm text-gray-700">Embed</label>
                        <button class="flex items-center space-x-2 text-sm text-slate-600 hover:text-amber-600 transition-all" onclick="copyEmbed()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M7 3.5A1.5 1.5 0 018.5 2h3.879a1.5 1.5 0 011.06.44l3.122 3.12A1.5 1.5 0 0117 6.622V12.5a1.5 1.5 0 01-1.5 1.5h-1v-3.379a3 3 0 00-.879-2.121L10.5 5.379A3 3 0 008.379 4.5H7v-1z" />
                                <path d="M4.5 6A1.5 1.5 0 003 7.5v9A1.5 1.5 0 004.5 18h7a1.5 1.5 0 001.5-1.5v-5.879a1.5 1.5 0 00-.44-1.06L9.44 6.439A1.5 1.5 0 008.378 6H4.5z" />
                            </svg>
                            <span id="embed_alert">Copy</span>
                        </button>
                    </div>
                    <div class="mt-2 p-4 rounded-lg shadow-inner text-xs font-mono text-[#ecf0f1] bg-[#2c3e50]">
                        {{$embed_url}}
                    </div>
                </div>
                {{-- Content | End --}}
            </div>

            <div class="bg-slate-100 rounded-b-lg px-6 py-4 flex items-center justify-between">
                @can('delete_episodes', $episode->podcast)
                    @livewire('episode.delete', ['episode' => $episode->id])
                @endcan

                <x-button wire:loading.attr="disabled" wire:click="save">
                    <span wire:loading.remove wire:target="save">
                        Save changes
                    </span>
                    <span wire:loading wire:target="save">Uploading</span>
                    <svg wire:loading wire:target="save" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="ml-3 w-5 h-5 animate-spin">
                        <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
                    </svg>
                </x-button>
            </div>
        </div>
    </div>

    <script>
        function copyEmbed() {
            let source = '{!! $embed_url !!}';
            navigator.clipboard.writeText(source);
            document.getElementById("embed_alert").innerText = "Copied!";
            setInterval(() => {
                document.getElementById("embed_alert").innerText = "Copy";
            }, 5000);
        }
    </script>
</div>

