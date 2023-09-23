<div>
    @livewire('submenu')

    <div class="py-6">
        <div class="text-2xl font-bold">Podcast Settings</div>

        <div class="mt-4 w-full bg-white rounded-lg shadow">
            <div class="p-6">
                <div>
                    <x-label for="name" value="Podcast name" />
                    <x-input type="text" id="name" wire:model.live="name" class="mt-1 w-full"/>
                    <x-input-error for="name" class="text-sm text-red-600 mt-2"/>
                </div>

                <div class="mt-6">
                    <x-label for="description" value="Description" />
                    <textarea wire:model.live="description" id="description" rows="6" class="input"></textarea>
                    <x-input-error for="description" class="text-sm text-red-600 mt-2"/>
                </div>

                <div class="mt-6 grid grid-cols-6 gap-8 items-center">
                    <div class="col-span-2 md:col-span-1">
                        @if ($podcast->cover && !$cover)
                                <img src="{{ Storage::url($podcast->cover) }}" class="w-full rounded-lg shadow aspect-square object-center object-cover">
                        @elseif($cover)
                            <img src="{{ $cover->temporaryUrl() }}" class="w-full rounded-lg shadow aspect-square object-center object-cover">
                        @else
                            <div class="flex-none w-full h-full aspect-square rounded-lg bg-indigo-100 flex items-center justify-center">
                                <img src="{{ asset('logo-mark-dark.svg') }}" class="w-12 h-auto">
                            </div>
                        @endif
                    </div>

                    <div class="col-span-6 md:col-span-5">
                        <div class="flex items-center">
                            <p class="text-sm font-boldblock font-medium text-gray-700">Podcast artwork</p>
                            @if ($podcast->cover)
                            <button wire:click="removeArtwork" class="ml-3 text-sm text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            @endif
                        </div>
                        <label for="artwork-file" class="mt-1 text-sm flex items-center space-x-4 w-full border-2 border-slate-200 border-dashed p-4 rounded-md relative cursor-pointer">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                            </div>
                            <div class="">
                                <p class="font-semibold text-slate-900">Click here to upload your artwork.</p>
                                <p class="text-slate-600">.png or .jpeg up to 3MB in size. 3000x3000px resolution recommended.</p>
                            </div>
                            <input type="file" wire:model.live="cover" id="artwork-file" accept="image/jpeg,image/png" class="hidden absolute inset-0">
                        </label>

                        <x-input-error for="cover" />
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-6 md:gap-8">
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="category" value="Category" />
                        <select wire:model.live="category" id="category" class="input">
                            @include('layouts.partials.podcast-categories')
                        </select>
                        <x-input-error for="category" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="language" value="Language" />
                        <select wire:model.live="language" id="language" class="input">
                            @include('layouts.partials.podcast-languages')
                        </select>
                        <x-input-error for="language" class="text-sm text-red-600 mt-2"/>
                    </div>
                </div>


                <div class="mt-6 grid grid-cols-2 gap-6 md:gap-8">
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="timezone" value="Publishing timezone" />
                        <select wire:model.live="timezone" id="timezone" class="input">
                            @include('layouts.partials.timezones-list')
                        </select>
                        <x-input-error for="timezone" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="explicit" value="Podcast content" />
                        <select wire:model.live="explicit" id="explicit" class="input">
                            <option value="" disabled="">Choose one option...</option>
                            <option value="false">Clean</option>
                            <option value="true">Explicit</option>
                        </select>
                        <x-input-error for="explicit" class="text-sm text-red-600 mt-2"/>
                    </div>
                </div>

                <div class="mt-6">
                    <x-label for="type" value="Podcast type" />
                    <label for="serial" class="mt-1 flex items-center space-x-2 text-sm">
                        <input id="serial" name="type" type="radio" wire:model.live="type" value="serial" class="rounded-full border border-slate-300"/>
                        <span>Serial - episodes are shown oldest to newest</span>
                    </label>
                    <label for="episodic" class="mt-1 flex items-center space-x-2 text-sm">
                        <input id="episodic" name="type" type="radio" wire:model.live="type" value="episodic" class="rounded-full border border-slate-300"/>
                        <span>Episodic (most popular) - episodes are shown newest to oldest</span>
                    </label>
                    <x-input-error for="type" class="text-sm text-red-600 mt-2"/>
                </div>

                <div class="mt-6">
                    <x-label for="author" value="Podcast author" />
                    <x-input type="text" id="author" wire:model.live="author" placeholder="Name of the podcast's creator(s)" class="mt-1 w-full"/>
                    <x-input-error for="author" class="text-sm text-red-600 mt-2"/>
                </div>

                <div class="mt-6">
                    <x-label for="url" value="Podcast url" />
                    <x-input type="text" wire:model.live="url" id="url" class="mt-1 w-full" placeholder="{{str($podcast->name)->slug()}}" autocomplete="off"/>
                    <a href="{{ config('app.url') }}/s/{{$podcast->url}}" target="_blank" class="mt-1 text-xs font-medium tracking-wider text-indigo-600">{{ config('app.url') }}/s/{{$podcast->url}}</a>
                </div>
            </div>

            <div class="mt-6 bg-slate-100 rounded-b-lg px-6 py-4 flex items-center justify-end">
                <x-button wire:click="save">Save changes</x-button>
            </div>
        </div>

        {{-- Funding --}}
        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-6">
                <p class="text-xl font-bold">Funding</p>
                <p class="mt-2 text-slate-600">Enable funding for your show, and allow your listeners to make donations directly to you.</p>
                <div class="mt-2">
                    <label for="funding-btn" class="flex items-center">
                        <input type="checkbox" name="funding" wire:model.live="funding" id="funding-btn" class="rounded">
                        @if ($funding)
                            <span class="ml-3 text-sm font-semibold text-slate-600">Funding enabled. Click to disable.</span>
                        @else
                            <span class="ml-3 text-sm font-semibold text-slate-600">Enable Funding</span>
                        @endif
                    </label>

                    @if ($funding)
                        <div class="mt-6">
                            <x-label for="funding_description" value="Funding page text" />
                            <textarea id="funding_description" cols="30" rows="10" class="input" wire:model.live="funding_description"
                                placeholder="Tell your listeners why should they support your podcast..."
                             ></textarea>
                            <x-input-error for="funding_description" class="text-sm text-red-600 mt-2"/>
                        </div>
                        <div class="mt-6">
                            <x-label for="funding_text" value="Button label" />
                            <x-input type="text" id="funding_text" wire:model.live="funding_text" placeholder="Support the show!" class="mt-1 w-full"/>
                            <x-input-error for="funding_text" class="text-sm text-red-600 mt-2"/>
                        </div>
                        <div class="mt-6">
                            <x-label for="funding_url" value="Button url" />
                            <x-input type="url" id="funding_url" wire:model.live="funding_url" placeholder="https://link_to_funding_site.com" class="mt-1 w-full"/>
                            <x-input-error for="funding_url" class="text-sm text-red-600 mt-2"/>
                        </div>
                    @endif
                </div>
            </div>
            <div class="px-6 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        {{-- Lock podcast --}}
        <div class="mt-12"></div>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-6">
                <div class="flex items-center space-x-3 fill-slate-600">
                    <p class="text-xl font-bold">Lock feed</p>
                </div>
                <p class="mt-2 text-slate-600">When this value is present and set to “yes”, the podcast feed cannot be imported or migrated to other platforms  that respect the tag.</p>
                <div class="mt-2">
                    <label for="is_locked-btn" class="flex items-center">
                        <input type="checkbox" name="is_locked" wire:model.live="is_locked" id="is_locked-btn" class="rounded">
                        @if ($is_locked)
                            <span class="ml-3 text-sm font-semibold text-slate-600">Feed locked. Click to unlock.</span>
                        @else
                            <span class="ml-3 text-sm font-semibold text-slate-600">Lock podcast feed</span>
                        @endif
                    </label>
                </div>
            </div>
            <div class="px-6 py-4 bg-slate-100 flex justify-end rounded-b-lg">
                <x-button wire:click="save">{{ __("Save changes") }}</x-button>
            </div>
        </div>

        @can('delete_podcast', $podcast)
            <div class="mt-12"></div>
            <div class="w-full bg-red-50 rounded-lg shadow">
                <div class="p-6">
                    <div class="flex items-center space-x-3">
                        <p class="text-xl font-bold text-red-600">Delete podcast</p>
                    </div>
                    <p class="mt-2 text-red-600">In this section, you can delete your podcast from Voicebits. This action cannot be undone, so please make sure you download all your episodes before you delete your show.</p>
                </div>
                <div class="px-6 py-4 bg-red-200 flex justify-end rounded-b-lg">
                    @livewire('show.delete', ['show' => $podcast->id])
                </div>
            </div>
        @endcan
    </div>
</div>
