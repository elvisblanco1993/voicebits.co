<div class="py-12">
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <h1 @class([
            'text-xl font-bold',
            'text-slate-400' => ($title)
        ])>New article</h1>
    </div>

    <div class="py-6 px-4 sm:px-6 lg:px-0">
        <input type="text" id="title" wire:model="title" placeholder="Title" autofocus
            class="w-full border-none rounded-lg focus:ring focus:ring-amber-200 text-2xl font-bold"/>
        <x-input-error for="title" class="mt-1" />
        <textarea id="content" wire:model="content" cols="30" rows="25" placeholder="Write something amazing..."
            class="mt-6 w-full border-none rounded-lg focus:ring focus:ring-amber-200"
        ></textarea>
        <small class="text-slate-500">Markdown is supported here.</small>
        <x-input-error for="content" class="mt-1" />

        <div class="mt-6 grid grid-cols-6 gap-8 items-center">
            <div class="col-span-2 md:col-span-1">
                @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full rounded-lg shadow aspect-square object-center object-cover">
                @else
                    <div class="flex-none w-full h-full aspect-square rounded-lg bg-amber-100 flex items-center justify-center">
                        <img src="{{ asset('logo-mark-dark.svg') }}" class="w-12 h-auto">
                    </div>
                @endif
            </div>

            <div class="col-span-6 md:col-span-5">
                <div class="flex items-center">
                    <p class="text-sm font-boldblock font-medium text-gray-700">Featured image</p>
                </div>
                <label for="artwork-file" class="mt-1 text-sm flex items-center space-x-4 w-full border-2 border-slate-200 border-dashed p-4 rounded-md relative cursor-pointer">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="font-semibold text-slate-900">Click here to upload your artwork.</p>
                        <p class="text-slate-600">webp up to 2MB in size.</p>
                    </div>
                    <input type="file" wire:model.live="image" id="artwork-file" accept="image/webp" class="hidden absolute inset-0">
                </label>
                <x-input-error for="image" class="mt-1" />
            </div>
        </div>

        <div class="mt-6">
            <x-label for="keywords">Keywords</x-label>
            <textarea id="keywords" wire:model="keywords" rows="6" placeholder="Write your keywords here, separated by commas..."
                class="mt-1 w-full border-none rounded-lg focus:ring focus:ring-amber-200"
            ></textarea>
            <x-input-error for="keywords" class="mt-1">
        </div>

        <div class="mt-6 flex items-end justify-between">
            <div class="w-1/2">
                <x-label for="author">Author</x-label>
                <input type="text" id="author" wire:model="author" placeholder="{{ Auth::user()->name }}" class="flex-none w-full border-none rounded-lg focus:ring focus:ring-amber-200 text-sm"/>
                <x-input-error for="author" class="mt-1" />
            </div>
            <div class="">
                <x-button wire:click="save">Save article</x-button>
            </div>
        </div>
    </div>
</div>
