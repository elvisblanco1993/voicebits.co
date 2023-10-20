<div>
    @livewire('submenu')
    <div class="py-6">
        <div class="flex items-center space-x-3">
            <a href="{{ route('podcast.episodes') }}" class="hover:text-indigo-600 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg>
            </a>
            <div class="text-2xl font-bold">New episode</div>
        </div>
        <div class="mt-4 w-full bg-white rounded-lg shadow">
            <div class="p-6">
                {{-- Content --}}
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
                        <button class="text-red-500" wire:click="deleteTrack">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                @endif

                <input type="file" accept="audio/mpeg" class="sr-only" wire:model.live="track" id="file-upload" />

                <label for="file-upload" class="flex sm:inline-flex items-center justify-center space-x-3 px-5 py-2.5 text-sm font-normal text-black cursor-pointer bg-yellow-300 hover:bg-yellow-400 transition-all rounded-full">
                    <span>@if ($track) Replace @else Upload @endif Episode</span>
                    <svg wire:loading.delay wire:loading.class="inline-block" wire:target="track" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="hidden w-5 h-5 animate-spin">
                        <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
                    </svg>
                </label>
                <p class="mt-1 text-xs text-slate-600">Supported formats: .mp3 or .m4a up to 200 megabytes.</p>

                <div class="mt-6">
                    <x-label for="title">Episode title <span class="text-red-500">*</span></x-label>
                    <x-input type="text" wire:model="title" id="title" placeholder="What do you want to call this episode?" class="mt-1 w-full"/>
                    <x-input-error for="title" class="mt-2 text-sm text-red-600"/>
                </div>
                <div class="mt-6">
                    <x-label for="description">Description <span class="text-red-500">*</span></x-label>
                    <textarea wire:model="description" id="description" rows="6" class="input"></textarea>
                    <x-input-error for="description" class="mt-2 text-sm text-red-600"/>
                </div>
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
                            class="border-slate-200 focus:ring focus:ring-indigo-100 focus:outline-none rounded-md block outline-none focus:border-indigo-200 mt-1 w-full">
                            <option disabled>Select an option</option>
                            <option value="full">Full episode</option>
                            <option value="trailer">Trailer</option>
                            <option value="bonus">Bonus</option>
                        </select>
                    </div>

                    <div class="">
                        <x-label for="type" value="Content type"/>
                        <select wire:model.live="explicit" id="type" required
                            class="border-slate-200 focus:ring focus:ring-indigo-100 focus:outline-none rounded-md block outline-none focus:border-indigo-200 mt-1 w-full">
                            <option disabled>Select an option</option>
                            <option value="false">Clean</option>
                            <option value="true">Explicit</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6 border-t border-dashed border-slate-200"></div>

                <div class="mt-6 grid grid-cols-6 gap-8 items-center">
                    <div class="col-span-2 md:col-span-1">
                        @if($cover)
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
                            <input type="file" wire:model.live="cover" class="mt-1 block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-indigo-50 file:text-indigo-700
                              hover:file:bg-indigo-100
                              cursor-pointer
                            "/>
                        </label>
                        <p class="mt-3 text-xs text-slate-600">Supported format: .png or .jpeg up to 3MB. Optimal resolution is 3000x3000px.</p>
                        <x-input-error for="cover" />
                    </div>
                </div>
                {{-- Content | End --}}
            </div>

            <div class="bg-slate-100 rounded-b-lg px-6 py-4 flex items-center justify-end">
                <x-button wire:loading.attr="disabled" wire:click="save">
                    <span wire:loading.remove wire:target="save">
                        @if ($published_at)
                            Upload & Publish
                        @else
                            Upload Episode
                        @endif
                    </span>
                    <span wire:loading wire:target="save">Uploading</span>
                    <svg wire:loading wire:target="save" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="ml-3 w-5 h-5 animate-spin">
                        <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
                    </svg>
                </x-button>
            </div>
        </div>
    </div>
</div>
