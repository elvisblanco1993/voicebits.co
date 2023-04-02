<div>
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <h1 @class([
            'text-4xl font-bold',
            'text-slate-400' => ($title)
        ])>New article</h1>
    </div>

    <div class="py-6 px-4 sm:px-6 lg:px-0">
        <input type="text" id="title" wire:model="title" placeholder="Title" autofocus
            class="w-full border-none rounded-lg focus:ring focus:ring-violet-200 text-2xl font-bold"/>
        <x-input-error for="title" class="mt-1" />
        <textarea id="content" wire:model="content" cols="30" rows="25" placeholder="Write something amazing..."
            class="mt-6 w-full border-none rounded-lg focus:ring focus:ring-violet-200"
        ></textarea>
        <small class="text-slate-500">Markdown is supported here.</small>
        <x-input-error for="content" class="mt-1" />

        <div class="mt-6 text-xl font-bold">Options</div>
        <div class="mt-4">
            <div class="w-full bg-white p-8 rounded-lg grid grid-cols-4 gap-4">
                <div class="col-span-4 md:col-span-1 mx-auto">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-36 h-36 rounded-lg aspect-square object-cover object-center">
                    @else
                        <div class="w-36 h-36 text-sm text-center rounded-lg flex items-center justify-center bg-violet-100 text-violet-400 p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="col-span-4 md:col-span-3 flex items-center justify-center">
                    <div>
                        <div class="text-slate-600 text-center">
                            <x-input-error for="image" class="mt-1" />
                            <p class="text-slate-600 text-center">Select an image to use it as your podcast artwork.</p>
                            <p class="mt-2 text-sm text-slate-500">PNG, JPG, up to 2MB</p>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-4">
                            <label for="image" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-violet-600 hover:bg-violet-50 hover:border-violet-200 transition-all cursor-pointer">
                                <span>Upload image</span>
                                <input id="image" type="file" wire:model="image" class="sr-only">
                            </label>
                            <button class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-red-600 hover:bg-red-50 hover:border-red-200 transition-all cursor-pointer">Delete Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-end justify-between">
            <div class="w-1/2">
                <x-label for="author">Author</x-label>
                <input type="text" id="author" wire:model.defer="author" placeholder="{{ Auth::user()->name }}" class="flex-none w-full border-none rounded-lg focus:ring focus:ring-violet-200 text-sm"/>
                <x-input-error for="author" class="mt-1" />
            </div>
            <div class="">
                <x-button wire:click="save">Save Post</x-button>
            </div>
        </div>
    </div>
</div>
