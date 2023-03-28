<div>
    <div class="py-12 max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold">Create podcast 🚀</h1>
        <p class="mt-4">Welcome to your new Voicebits account. To get started, please create your first podcast. It's okay if you don't know exactly what to put. You can always change the details later.</p>
        <form wire:submit.prevent="save">
            @csrf
            <div class="mt-6">
                <x-label for="name" value="Podcast name" />
                <x-input type="text" id="name" wire:model.defer="name" class="mt-1 w-full" autofocus/>
                <x-input-error for="name" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-6">
                <x-label for="description" value="Podcast description" />
                <textarea wire:model.defer="description" id="description" rows="6" class="input"></textarea>
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
                    <label for="serial" class="mt-1 inline-flex items-center space-x-3 text-sm px-4 py-2 border rounded-lg cursor-pointer hover:border-indigo-300">
                        <input type="radio" name="type" wire:model="type" id="serial" value="serial" class="cursor-pointer">
                        <span>{{ __("Serial") }}</span>
                    </label>
                    <label for="episodic" class="mt-1 mx-2 inline-flex items-center space-x-3 text-sm px-4 py-2 border rounded-lg cursor-pointer hover:border-indigo-300">
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
                <x-input type="text" id="author" wire:model.defer="author" class="mt-1 w-full"/>
                <x-input-error for="author" class="text-sm text-red-600 mt-2"/>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('podcast.catalog') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                >{{ __("Cancel") }}</a>
                <x-button type="submit" class="ml-4">{{ __("Create show") }}</x-button>
            </div>
        </form>
    </div>
</div>
