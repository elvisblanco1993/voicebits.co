<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        @include('layouts.podcast-menu')

        <div class="mt-10 flex items-center justify-between">
            <div class="text-xl font-bold">Podcast Settings</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>

        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div>
                <x-jet-label for="name" value="Podcast name" />
                <x-jet-input type="text" id="name" wire:model.defer="name" class="mt-1 w-full"/>
                <x-jet-input-error for="name" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="description" value="Podcast description" />
                <textarea wire:model="description" id="description" rows="6" class="input"></textarea>
                <x-jet-input-error for="description" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="category" value="Podcast category" />
                <select wire:model.defer="category" id="category" class="input">
                    @include('layouts.partials.podcast-categories')
                </select>
                <x-jet-input-error for="category" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="language" value="Podcast language" />
                <select wire:model.defer="language" id="language" class="input">
                    @include('layouts.partials.podcast-languages')
                </select>
                <x-jet-input-error for="language" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="type" value="Podcast type" />
                <select wire:model.defer="type" id="type" class="input">
                    <option value="" disabled="">Choose one option...</option>
                    <option value="serial">Serial</option>
                    <option value="episodic">Episodic</option>
                </select>
                <x-jet-input-error for="type" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="explicit" value="Podcast content" />
                <select wire:model.defer="explicit" id="explicit" class="input">
                    <option value="" disabled="">Choose one option...</option>
                    <option value="false">Clean</option>
                    <option value="true">Explicit</option>
                </select>
                <x-jet-input-error for="explicit" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="timezone" value="Publishing timezone" />
                <select wire:model.defer="timezone" id="timezone" class="input">
                    @include('layouts.partials.timezones-list')
                </select>
                <x-jet-input-error for="timezone" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="author" value="Podcast author" />
                <x-jet-input type="text" id="author" wire:model.defer="author" class="mt-1 w-full"/>
                <x-jet-input-error for="author" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6" id="show-url">
                <x-jet-label for="url" value="Podcast url" />
                <div class="mt-1 flex">
                    <input type="text" wire:model="url" id="url"
                        class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-l-md shadow-sm w-auto"
                        placeholder="{{ str($podcast->name)->slug() }}"
                        @disabled($podcast->url)>
                    <span class="inline-flex flex-none items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">.voicebits.co</span>

                </div>
                <a href="https://{{str($podcast->name)->slug()}}.voicebits.co" target="_blank" class="mt-1 text-xs font-medium tracking-wider text-[#0099ff]">https://{{str($podcast->name)->slug()}}.voicebits.co</a>
            </div>
        </div>

        {{-- Funding --}}
        <div class="mt-10 flex items-center justify-between">
            <div class="text-xl font-bold">Funding</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>
        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <label for="funding-btn" class="flex items-center">
                <input type="checkbox" name="funding" wire:model="funding" id="funding-btn" class="rounded">
                @if ($funding)
                    <span class="ml-3 text-sm font-semibold text-slate-600">Funding enabled. Click to disable.</span>
                @else
                    <span class="ml-3 text-sm font-semibold text-slate-600">Enable Funding</span>
                @endif
            </label>

            @if ($funding)
                <div class="mt-6">
                    <x-jet-label for="funding_text" value="Button label" />
                    <x-jet-input type="text" id="funding_text" wire:model.defer="funding_text" placeholder="Support the show!" class="mt-1 w-full"/>
                    <x-jet-input-error for="funding_text" class="text-sm text-red-600 mt-2"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="funding_url" value="Button url" />
                    <x-jet-input type="url" id="funding_url" wire:model.defer="funding_url" placeholder="https://link_to_funding_site.com" class="mt-1 w-full"/>
                    <x-jet-input-error for="funding_url" class="text-sm text-red-600 mt-2"/>
                </div>
            @endif
        </div>

        {{-- Lock podcast --}}
        <div class="mt-10 flex items-center justify-between">
            <div>
                <div class="text-xl font-bold">Lock feed</div>
                <p class="block text-sm font-semibold text-slate-600 max-w-xl">When this value is present and set to “yes”, the podcast feed cannot be imported or migrated to other platforms  that respect the tag.</p>
            </div>
            <x-jet-button wire:click="save" class="flex-none">Save changes</x-jet-button>
        </div>
        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <label for="is_locked-btn" class="flex items-center">
                <input type="checkbox" name="is_locked" wire:model="is_locked" id="is_locked-btn" class="rounded">
                @if ($is_locked)
                    <span class="ml-3 text-sm font-semibold text-slate-600">Feed locked. Click to unlock.</span>
                @else
                    <span class="ml-3 text-sm font-semibold text-slate-600">Lock podcast feed</span>
                @endif
            </label>
        </div>

        {{-- Cover art --}}
        <div class="mt-10 flex items-center justify-between" id="artwork">
            <div class="text-xl font-bold">Cover artwork</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>
        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div class="grid grid-cols-4 gap-8">
                <div class="col-span-4 sm:col-span-1">
                    @if ($podcast->cover && !$cover)
                        <img src="{{ Storage::url($podcast->cover) }}" class="w-full aspect-square object-center object-cover">
                    @elseif($cover)
                        <img src="{{ $cover->temporaryUrl() }}" class="w-full aspect-square object-center object-cover">
                    @else
                        <div class="w-full aspect-square bg-blue-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-[#0099ff]" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="col-span-4 sm:col-span-3 flex flex-col justify-center">
                    <div class="text-center">
                        <div class="text-slate-600 text-center">
                            <p>Select an image to use it as your podcast artwork.</p>
                            <p class="mt-2 text-sm text-slate-500">PNG, JPG, up to 2MB</p>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-4">
                            <div>
                                <label for="cover" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all cursor-pointer">
                                    <input type="file" wire:model="cover" id="cover" accept="image/jpeg,image/png" class="sr-only">
                                    Upload artwork
                                </label>
                            </div>
                            <div class="">
                                <button wire:click="removeArtwork" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-red-600 hover:bg-red-50 hover:border-red-200 transition-all cursor-pointer">
                                    Remove artwork
                                </button>
                            </div>
                        </div>
                        <x-jet-input-error for="cover" class="text-sm text-red-600 mt-2"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 flex items-center justify-between">
            <div class="text-xl font-bold text-red-600">Danger zone</div>
        </div>
        <div class="mt-4 w-full bg-red-200 rounded-lg p-8">
            @livewire('show.delete', ['show' => $podcast->id])
        </div>
    </div>
</div>
