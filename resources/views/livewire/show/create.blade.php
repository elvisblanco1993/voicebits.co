<div x-data="{open:false}">
    @if (auth()->user()->podcasts->count() == 0)
        <h1 class="text-lg font-bold">Create your first podcast to get started.</h1>
        <p class="mt-4 text-lg">{{ __("Welcome to Voicebits! We're excited to have you as a member of our podcast hosting platform. You've taken the first step towards sharing your voice with the world, and we're here to help you every step of the way.") }}</p>
        <p class="mt-3 text-lg">{{ __("Click the button below to create your first podcast.") }}</p>
        <div class="block mt-6">
            <a href="{{ route('show.import.start') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
            >Import from feed</a>
            <x-button x-on:click="open = !open" class="ml-4">New podcast</x-button>
        </div>
    @endif
    <div x-show="open" x-cloak class="h-50 absolute inset-0 bg-white">

        <div class="flex justify-end mt-4 mr-4">
            <button x-on:click="open = !open" class="bg-slate-100 text-slate-600 p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex items-center justify-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-3xl font-bold">Create podcast 🚀</h1>
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="mt-6">
                        <x-label for="name" value="Podcast name" />
                        <x-input type="text" id="name" wire:model="name" class="mt-1 w-full"/>
                        <x-input-error for="name" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="mt-6">
                        <x-label for="description" value="Podcast description" />
                        <textarea wire:model="description" id="description" rows="6" class="input"></textarea>
                        <x-input-error for="description" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-8">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="category" value="Podcast category" />
                            <select wire:model="category" id="category" class="input">
                                @include('layouts.partials.podcast-categories')
                            </select>
                            <x-input-error for="category" class="text-sm text-red-600 mt-2"/>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label value="Podcast type" />
                            <label for="serial" class="mt-1 inline-flex items-center space-x-3 text-sm px-4 py-2 border rounded-lg cursor-pointer hover:border-blue-300">
                                <input type="radio" name="type" wire:model="type" id="serial" value="serial" class="cursor-pointer">
                                <span>{{ __("Serial") }}</span>
                            </label>
                            <label for="episodic" class="mt-1 mx-2 inline-flex items-center space-x-3 text-sm px-4 py-2 border rounded-lg cursor-pointer hover:border-blue-300">
                                <input type="radio" name="type" wire:model="type" id="episodic" value="episodic" class="cursor-pointer">
                                <span>{{ __("Episodic") }}</span>
                            </label>
                            <x-input-error for="type" class="text-sm text-red-600 mt-2"/>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-8">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="language" value="Podcast language" />
                            <select wire:model="language" id="language" class="input">
                                @include('layouts.partials.podcast-languages')
                            </select>
                            <x-input-error for="language" class="text-sm text-red-600 mt-2"/>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="timezone" value="Publishing timezone" />
                            <select wire:model="timezone" id="timezone" class="input">
                                @include('layouts.partials.timezones-list')
                            </select>
                            <x-input-error for="timezone" class="text-sm text-red-600 mt-2"/>
                        </div>
                    </div>
                    <div class="mt-6">
                        <x-label for="author" value="Podcast author" />
                        <x-input type="text" id="author" wire:model="author" class="mt-1 w-full"/>
                        <x-input-error for="author" class="text-sm text-red-600 mt-2"/>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="open = !open">{{ __("Cancel") }}</x-secondary-button>
                        <x-button type="submit" class="ml-4">{{ __("Create show") }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
