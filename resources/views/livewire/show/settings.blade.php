<div>
    @include('layouts.podcast-menu')

    <div class="mt-6 text-xl font-bold">Podcast Settings</div>

    <div class="mt-4 w-full bg-white rounded-lg shadow">
        <div class="pt-6 grid grid-cols-3 px-8">
            <div class="col-span-3 md:col-span-1">
                <x-label for="name" value="Podcast name" />
            </div>
            <div class="col-span-3 md:col-span-2">
                <x-input type="text" id="name" wire:model.defer="name" class="mt-1 w-full"/>
                <x-input-error for="name" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="description" value="Podcast description" />
            <div class="col-span-3 md:col-span-2">
                <textarea wire:model="description" id="description" rows="6" class="input"></textarea>
                <x-input-error for="description" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="category" value="Podcast category" />

            <div class="col-span-3 md:col-span-2">
                <select wire:model.defer="category" id="category" class="input">
                    @include('layouts.partials.podcast-categories')
                </select>
                <x-input-error for="category" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="language" value="Podcast language" />
            <div class="col-span-3 md:col-span-2">
                <select wire:model.defer="language" id="language" class="input">
                    @include('layouts.partials.podcast-languages')
                </select>
                <x-input-error for="language" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="type" value="Podcast type" />
            <div class="col-span-3 md:col-span-2">
                <select wire:model.defer="type" id="type" class="input">
                    <option value="" disabled="">Choose one option...</option>
                    <option value="serial">Serial</option>
                    <option value="episodic">Episodic</option>
                </select>
                <x-input-error for="type" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="explicit" value="Podcast content" />
            <div class="col-span-3 md:col-span-2">
                <select wire:model.defer="explicit" id="explicit" class="input">
                    <option value="" disabled="">Choose one option...</option>
                    <option value="false">Clean</option>
                    <option value="true">Explicit</option>
                </select>
                <x-input-error for="explicit" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="timezone" value="Publishing timezone" />
            <div class="col-span-3 md:col-span-2">
                <select wire:model.defer="timezone" id="timezone" class="input">
                    @include('layouts.partials.timezones-list')
                </select>
                <x-input-error for="timezone" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8">
            <x-label for="author" value="Podcast author" />
            <div class="col-span-3 md:col-span-2">
                <x-input type="text" id="author" wire:model.defer="author" class="mt-1 w-full"/>
                <x-input-error for="author" class="text-sm text-red-600 mt-2"/>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-3 px-8" id="show-url">
            <x-label for="url" value="Podcast url" />
            <div class="col-span-3 md:col-span-2">
                <x-input type="text" wire:model="url" id="url" class="mt-1 w-full" placeholder="{{str($podcast->name)->slug()}}" autocomplete="off"/>
                <a href="{{ config('app.url') }}/s/{{$podcast->url}}" target="_blank" class="mt-1 text-xs font-medium tracking-wider text-blue-600">{{ config('app.url') }}/s/{{$podcast->url}}</a>
            </div>
        </div>
        <div class="mt-6 bg-slate-200 px-8 py-4 flex items-center justify-end">
            <x-button wire:click="save">Save changes</x-button>
        </div>
    </div>

    {{-- Cover art --}}
    <div class="mt-12"></div>
    <div class="w-full bg-white rounded-lg shadow">
        <div class="p-8">
            <div class="flex items-center space-x-3 fill-slate-600">
                <p class="text-xl font-bold">Covert artwork</p>
            </div>
            <p class="mt-2 text-slate-600">Select an image to use it as your podcast artwork.<br>Make sure your image is between 1500x1450 px and 3000x3000 px, weights less than 2MB, and is in jpeg or png format.</p>
            <div class="mt-2">
                <div class="">
                    @if ($podcast->cover && !$cover)
                            <img src="{{ Storage::url($podcast->cover) }}" class="w-40 h-40 rounded-lg shadow aspect-square object-center object-cover">
                    @elseif($cover)
                        <img src="{{ $cover->temporaryUrl() }}" class="w-40 h-40 rounded-lg shadow aspect-square object-center object-cover">
                    @else
                        <div class="flex-none h-40 w-40 rounded-lg bg-blue-50 flex items-center justify-center">
                            <img src="{{ asset('logo-mark.svg') }}" class="w-12 h-auto">
                        </div>
                    @endif
                </div>
                <x-input-error for="cover"/>
            </div>
        </div>
        <div class="px-8 py-4 bg-slate-200 flex justify-between rounded-b-lg">
            <div class="flex items-center justify-center gap-4">
                <div class="">
                    <button wire:click="removeArtwork" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-red-600 hover:bg-red-50 hover:border-red-200 transition-all cursor-pointer">
                        Remove artwork
                    </button>
                </div>
                <div>
                    <label for="artwork" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all cursor-pointer">
                        <input type="file" wire:model="cover" id="artwork" accept="image/jpeg,image/png" class="sr-only">
                        Upload artwork
                    </label>
                </div>
            </div>
            <x-button wire:click="save">{{ __("Save changes") }}</x-button>
        </div>
    </div>

    {{-- Funding --}}
    <div class="mt-12"></div>
    <div class="w-full bg-white rounded-lg shadow">
        <div class="p-8">
            <div class="flex items-center space-x-3 fill-slate-600">
                <p class="text-xl font-bold">Funding</p>
            </div>
            <p class="mt-2 text-slate-600">Enable funding for your show, and allow your listeners to make donations directly to you.</p>
            <div class="mt-2">
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
                        <x-label for="funding_text" value="Button label" />
                        <x-input type="text" id="funding_text" wire:model.defer="funding_text" placeholder="Support the show!" class="mt-1 w-full"/>
                        <x-input-error for="funding_text" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="mt-6">
                        <x-label for="funding_url" value="Button url" />
                        <x-input type="url" id="funding_url" wire:model.defer="funding_url" placeholder="https://link_to_funding_site.com" class="mt-1 w-full"/>
                        <x-input-error for="funding_url" class="text-sm text-red-600 mt-2"/>
                    </div>
                @endif
            </div>
        </div>
        <div class="px-8 py-4 bg-slate-200 flex justify-end rounded-b-lg">
            <x-button wire:click="save">{{ __("Save changes") }}</x-button>
        </div>
    </div>

    {{-- Lock podcast --}}
    <div class="mt-12"></div>
    <div class="w-full bg-white rounded-lg shadow">
        <div class="p-8">
            <div class="flex items-center space-x-3 fill-slate-600">
                <p class="text-xl font-bold">Lock feed</p>
            </div>
            <p class="mt-2 text-slate-600">When this value is present and set to “yes”, the podcast feed cannot be imported or migrated to other platforms  that respect the tag.</p>
            <div class="mt-2">
                <label for="is_locked-btn" class="flex items-center">
                    <input type="checkbox" name="is_locked" wire:model="is_locked" id="is_locked-btn" class="rounded">
                    @if ($is_locked)
                        <span class="ml-3 text-sm font-semibold text-slate-600">Feed locked. Click to unlock.</span>
                    @else
                        <span class="ml-3 text-sm font-semibold text-slate-600">Lock podcast feed</span>
                    @endif
                </label>
            </div>
        </div>
        <div class="px-8 py-4 bg-slate-200 flex justify-end rounded-b-lg">
            <x-button wire:click="save">{{ __("Save changes") }}</x-button>
        </div>
    </div>

    @can('delete_podcast', $podcast)
        <div class="mt-12"></div>
        <div class="w-full bg-red-50 rounded-lg shadow">
            <div class="p-8">
                <div class="flex items-center space-x-3">
                    <p class="text-xl font-bold text-red-600">Delete podcast</p>
                </div>
                <p class="mt-2 text-red-600">In this section, you can delete your podcast from Voicebits. This action cannot be undone, so please make sure you download all your episodes before you delete your show.</p>
            </div>
            <div class="px-8 py-4 bg-red-200 flex justify-end rounded-b-lg">
                @livewire('show.delete', ['show' => $podcast->id])
            </div>
        </div>
    @endcan
    <div class="py-12"></div>
</div>
