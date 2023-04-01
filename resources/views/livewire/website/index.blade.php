<div>
    <div class="max-w-7xl mx-auto h-44 bg-center bg-cover" style="background-image: url('{{ asset($podcast->cover) }}') ">
        <div class="h-full flex items-center bg-slate-900/60 backdrop-blur-xl px-4 sm:px-6 lg:px-8">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-xl object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-xl bg-indigo-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-10 h-auto">
                </div>
            @endif
            <h1 class="ml-6 text-3xl font-bold text-white">{{ $podcast->name }}</h1>
        </div>
    </div>

    @livewire('submenu')

    <div class="py-6">
        <div class="text-2xl font-bold">Website</div>
        <p class="text-base text-slate-600 font-medium">Select a template for your podcast website.</p>

        <div class="py-6 grid grid-cols-4 gap-8">
            <label wire:click="setTemplate" for="classic" class="col-span-4 md:col-span-2 lg:col-span-1 bg-white rounded-xl border">
                <img src="https://images.unsplash.com/photo-1530564386-40be0e9dea6f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="Classic theme image" class="w-full aspect-video object-cover object-center rounded-t-xl">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-slate-600 dark:text-slate-700">Classic</p>
                        <input type="radio" name="template" id="classic" value="classic" wire:model="template" class="">
                    </div>
                    <div class="mt-2 text-sm text-slate-600">
                        The original Voicebits theme. Includes a full width player.
                    </div>
                </div>
            </label>

            <label wire:click="setTemplate" for="modern" class="col-span-4 md:col-span-2 lg:col-span-1 bg-white rounded-xl border">
                <img src="{{ asset('modern-podcast.webp') }}" alt="Modern theme image" class="w-full aspect-video object-cover object-center rounded-t-xl">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-slate-600 dark:text-slate-700">Modern</p>
                        <input type="radio" name="template" id="modern" value="modern" wire:model="template" class="">
                    </div>
                    <div class="mt-2 text-sm text-slate-600">
                        Refreshed template with top slim player.
                    </div>
                </div>
            </label>
        </div>

        <div class="my-6 border-t"></div>

        <div class="py-6">
            <div class="text-2xl font-bold">Colors</div>
            <div class="mt-4 grid grid-cols-3 gap-8">
                <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                    <label for="header_bg" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                        <input type="color" name="header_bg" id="header_bg" class="sr-only">
                    </label>
                    <div>
                        <p class="text-lg font-bold">Header background</p>
                        <p class="text-sm">Main background color of the header</p>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_bg" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_bg" id="header_bg" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">Header background</p>
                            <p class="text-sm">Main background color of the header</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_bg" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_bg" id="header_bg" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">Header background</p>
                            <p class="text-sm">Main background color of the header</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_bg" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_bg" id="header_bg" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">Header background</p>
                            <p class="text-sm">Main background color of the header</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_bg" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_bg" id="header_bg" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">Header background</p>
                            <p class="text-sm">Main background color of the header</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_bg" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_bg" id="header_bg" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">Header background</p>
                            <p class="text-sm">Main background color of the header</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-6 border-t"></div>

        <div class="py-6">
            <div class="text-2xl font-bold">Custom styles</div>
            <textarea name="" id="" cols="30" rows="10" class="mt-4 input" placeholder="You can include custom CSS here to replace any stiles in your page."></textarea>
        </div>

    </div>
</div>
