<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('episodes', ['show' => $show]) }}" class="hover:text-[#0099ff] transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                    </svg>
                </a>
                <div class="text-xl font-bold">New episode</div>
            </div>
            <x-button wire:click="save">Save episode</x-button>
        </div>

        {{-- Content section --}}
        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div class="">
                <div class="relative h-16 rounded-lg border-dashed border border-gray-400 bg-white flex justify-center items-center hover:cursor-pointer">
                    <div class="absolute">
                        <div class="flex items-center gap-2">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"></path>
                                <path fill-rule="evenodd" d="M10 8V3a2 2 0 1 0-4 0v5a2 2 0 1 0 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z"></path>
                            </svg>
                            @if ($track)
                                <span class="block font-semibold text-sm text-green-500">Your track is now ready.</span>
                                {{-- Get the audio duration --}}
                                    <audio id="audio_temp" src="{{ $track->temporaryUrl() }}" preload="metadata"></audio>
                                    <script>
                                        var audioFile = document.getElementById("audio_temp");
                                        audioFile.onloadedmetadata = function() {
                                            window.livewire.emit('getAudioDuration', audioFile.duration)
                                        }
                                    </script>
                                {{-- End of Get the audio duration --}}
                            @else
                                <span class="block font-normal text-sm">Upload an audio file<p class="text-xs text-gray-500">MP3 only supported</p></span>
                            @endif
                        </div>
                    </div>
                    <input id="file-upload" wire:model="track" type="file" accept="audio/mpeg" class="h-full w-full opacity-0 cursor-pointer">
                </div>
                <x-input-error for="track" class="mt-2 text-sm text-red-600"/>
            </div>
            <div class="mt-6">
                <label for="title" class="block font-medium text-sm text-gray-700">Episode title <span class="text-red-500">*</span></label>
                <x-input type="text" wire:model="title" id="title" placeholder="What do you want to call this episode?" class="mt-1 w-full"/>
                <x-input-error for="title" class="mt-2 text-sm text-red-600"/>
            </div>
            <div class="mt-6">
                <label for="description" class="block font-medium text-sm text-gray-700">Episode description <span class="text-red-500">*</span></label>
                <textarea wire:model="description" id="description" rows="10" class="input"></textarea>
                <x-input-error for="description" class="mt-2 text-sm text-red-600"/>
            </div>
            <div class="mt-6">
                <label for="published_at" class="block font-medium text-sm text-gray-700">Publish date</label>
                <x-input type="datetime-local" wire:model.defer="published_at" id="published_at" placeholder="What do you want to call this episode?" class="mt-1"/>
                <input type="hidden" id="timezone" name="timezone" value="{{ $podcast->timezone }}">
            </div>
        </div>

        {{-- Episode Options --}}
        <div class="mt-6 text-xl font-bold">Optional</div>
        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div class="grid grid-cols-2 gap-8">
                <div class="col-span-2 sm:col-span-1 grid">
                    <div class="grid grid-cols-3 sm:gap-8">
                        <div class="col-span-3 sm:col-span-1">
                            <x-label for="season" value="Season number"/>
                        </div>
                        <div class="col-span-3 sm:col-span-2 mt-1 sm:mt-0">
                            <x-input type="text" id="season" wire:model="season" class="w-full"/>
                        </div>
                    </div>

                    <div class="w-full border-t mt-4"></div>

                    <div class="mt-4 grid grid-cols-3 sm:gap-8">
                        <div class="col-span-3 sm:col-span-1">
                            <x-label for="number" value="Episode number"/>
                        </div>
                        <div class="col-span-3 sm:col-span-2 mt-1 sm:mt-0">
                            <x-input type="text" id="number" wire:model="number" class="w-full"/>
                        </div>
                    </div>

                    <div class="w-full border-t mt-4"></div>

                    <div class="mt-4 grid grid-cols-3 sm:gap-8">
                        <div class="col-span-3 sm:col-span-1">
                            <x-label for="" value="Episode type"/>
                        </div>
                        <div class="col-span-3 sm:col-span-2 mt-1 sm:mt-0">
                            <label for="full" class="flex items-center gap-2 text-sm">
                                <input id="full" type="radio" wire:model="type" name="type" value="full">
                                <span>Full</span>
                            </label>
                            <label for="trailer" class="mt-1 flex items-center gap-2 text-sm">
                                <input id="trailer" type="radio" wire:model="type" name="type" value="trailer">
                                <span>Trailer</span>
                            </label>
                            <label for="bonus" class="mt-1 flex items-center gap-2 text-sm">
                                <input id="bonus" type="radio" wire:model="type" name="type" value="bonus">
                                <span>Bonus</span>
                            </label>
                        </div>
                    </div>

                    <div class="w-full border-t mt-4"></div>

                    <div class="mt-4 grid grid-cols-3 sm:gap-8">
                        <div class="col-span-3 sm:col-span-1">
                            <x-label for="" value="Content"/>
                        </div>
                        <div class="col-span-3 sm:col-span-2 mt-1 sm:mt-0">
                            <label for="clean" class="flex items-center gap-2 text-sm">
                                <input id="clean" type="radio" wire:model="explicit" name="explicit" value="false">
                                <span>Clean</span>
                            </label>
                            <label for="explicit" class="mt-1 flex items-center gap-2 text-sm">
                                <input id="explicit" type="radio" wire:model="explicit" name="explicit" value="true">
                                <span>Explicit</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 sm:col-span-1 text-center">
                    @if($cover)
                        <img src="{{ $cover->temporaryUrl() }}" class="w-1/2 mx-auto aspect-square object-center object-cover rounded-lg">
                    @else
                        <div class="w-1/2 mx-auto aspect-square bg-slate-100 rounded-lg shadow flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-slate-500" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </div>
                    @endif

                    <div class="mt-4">
                        <label for="cover" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all cursor-pointer">
                            <input id="cover" type="file" accept="image/jpg,image/png" wire:model="cover" class="sr-only">
                            Upload episode art
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
