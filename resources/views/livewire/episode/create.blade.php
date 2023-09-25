<div>
    @livewire('submenu')
    <div class="py-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-0">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('podcast.episodes') }}" class="hover:text-indigo-600 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                    </svg>
                </a>
                <div class="text-2xl font-bold">New episode</div>
            </div>
            <x-button wire:click="save">
                <span wire:loading.remove wire:target="save">Upload Episode</span>
                <svg wire:loading wire:target="save" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 animate-spin">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </x-button>
        </div>

        <div class="mt-4 grid grid-cols-6 gap-4">
            {{-- Main content --}}
            <div class="col-span-6 md:col-span-4 p-4 border border-slate-200 rounded-lg">
                <div>
                    <div class="relative h-16 rounded-lg border-dashed border border-gray-400 bg-white flex justify-center items-center hover:cursor-pointer">
                        <div class="absolute">
                            <div class="flex items-center gap-2">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"></path>
                                    <path fill-rule="evenodd" d="M10 8V3a2 2 0 1 0-4 0v5a2 2 0 1 0 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z"></path>
                                </svg>

                                @if ($track)
                                    <span class="block font-semibold text-sm text-green-500">Your track is now ready.</span>
                                    <div x-init="getTrackDuration('{{ $track->temporaryURL() }}')"></div>
                                @else
                                    <span class="block font-normal text-sm">Upload an audio file<p class="text-xs text-gray-500">MP3 only supported</p></span>
                                @endif
                            </div>
                        </div>
                        <input id="file-upload" wire:model.live="track" type="file" accept="audio/mpeg" class="h-full w-full opacity-0 cursor-pointer">
                    </div>
                    <x-input-error for="track" class="mt-2 text-sm text-red-600"/>
                </div>
                <div class="mt-6">
                    <label for="title" class="block font-medium text-sm text-gray-700">Episode title <span class="text-red-500">*</span></label>
                    <x-input type="text" wire:model.live="title" id="title" placeholder="What do you want to call this episode?" class="mt-1 w-full"/>
                    <x-input-error for="title" class="mt-2 text-sm text-red-600"/>
                </div>
                <div class="mt-6">
                    <label for="description" class="block font-medium text-sm text-gray-700">Episode description <span class="text-red-500">*</span></label>
                    <textarea wire:model.live="description" id="description" rows="10" class="input"></textarea>
                    <x-input-error for="description" class="mt-2 text-sm text-red-600"/>
                </div>
                <div class="mt-6">
                    <label for="published_at" class="block font-medium text-sm text-gray-700">Publish date</label>
                    <x-input type="datetime-local" wire:model.live="published_at" id="published_at" class="mt-1"/>
                    <input type="hidden" id="timezone" name="timezone" value="{{ $podcast->timezone }}">
                </div>
            </div>

            {{-- Sidenav --}}
            <div class="col-span-6 md:col-span-2 p-4 border border-slate-200 rounded-lg">
                <div class="">
                    <x-label for="season" value="Season number"/>
                    <x-input type="number" id="season" wire:model.live="season" class="mt-1 w-full"/>
                </div>
                <div class="mt-4">
                    <x-label for="number" value="Episode number"/>
                    <x-input type="number" id="number" wire:model.live="number" class="mt-1 w-full"/>
                </div>

                <div class="mt-4">
                    <x-label for="type" value="Episode type"/>
                    <select wire:model.live="type" id="type" required
                        class="border-slate-200 focus:ring focus:ring-indigo-100 focus:outline-none rounded-md block outline-none focus:border-indigo-200 mt-1 w-full">
                        <option disabled>Select an option</option>
                        <option value="full">Full episode</option>
                        <option value="trailer">Trailer</option>
                        <option value="bonus">Bonus</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="type" value="Content type"/>
                    <select wire:model.live="explicit" id="type" required
                        class="border-slate-200 focus:ring focus:ring-indigo-100 focus:outline-none rounded-md block outline-none focus:border-indigo-200 mt-1 w-full">
                        <option disabled>Select an option</option>
                        <option value="false">Clean</option>
                        <option value="true">Explicit</option>
                    </select>
                </div>

                <div class="mt-4">
                    @if($cover)
                        <img src="{{ $cover->temporaryUrl() }}" class="w-full mx-auto aspect-square object-center object-cover rounded-lg">
                    @endif

                    <div class="mt-4">
                        <label for="cover" class="block w-full text-center text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 transition-all cursor-pointer">
                            <input id="cover" type="file" accept=".png,.jpeg" wire:model.live="cover" class="sr-only">
                            Upload episode art
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getTrackDuration(track) {
            var tempTrack = new Audio(track);
            tempTrack.onloadedmetadata = function() {
                Livewire.dispatch('getAudioDuration', {duration: tempTrack.duration})
            }
        }
    </script>
</div>
