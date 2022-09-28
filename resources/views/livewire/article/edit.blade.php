<div>
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <h1 @class([
            'text-4xl font-bold',
            'text-slate-400' => ($title)
        ])>Editing article</h1>
    </div>

    <div class="py-6 px-4 sm:px-6 lg:px-0">
        <input type="text" id="title" wire:model.defer="title" placeholder="Title" autofocus
            class="w-full border-none rounded-lg focus:ring focus:ring-sky-200 text-2xl font-bold"/>
        <x-jet-input-error for="title" class="mt-1" />
        <textarea id="content" wire:model.defer="content" cols="30" rows="25" placeholder="Write something amazing..."
            class="mt-6 w-full border-none rounded-lg focus:ring focus:ring-sky-200"
        ></textarea>
        <small class="text-slate-500">Markdown is supported here.</small>
        <x-jet-input-error for="content" class="mt-1" />

        <div class="mt-6 text-xl font-bold">Options</div>
        <div class="mt-4">
            <div class="w-full bg-white p-8 rounded-lg grid grid-cols-4 gap-4">
                <div class="col-span-4 md:col-span-1 mx-auto">
                    @if ($image && $article->image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-36 h-36 rounded-lg aspect-square object-cover object-center">
                    @else
                        <img src="{{ asset($article->image) }}" class="w-36 h-36 rounded-lg aspect-square object-cover object-center">
                    @endif
                </div>
                <div class="col-span-4 md:col-span-3 flex items-center justify-center">
                    <div>
                        <div class="text-slate-600 text-center">
                            <x-jet-input-error for="image" class="mt-1" />
                            <p class="text-slate-600 text-center">Select an image to use it as your podcast artwork.</p>
                            <p class="mt-2 text-sm text-slate-500">PNG, JPG, up to 2MB</p>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-4">
                            <label for="image" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 transition-all cursor-pointer">
                                <span>Upload image</span>
                                <input id="image" type="file" wire:model="image" class="sr-only">
                            </label>
                            <button wire:click="deleteImage" class="text-sm text-slate-600 px-3 py-2 rounded-lg border border-slate-200 hover:text-red-600 hover:bg-red-50 hover:border-red-200 transition-all cursor-pointer">Delete Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-end justify-between">
            <div class="w-1/2">
                <x-jet-label for="author">Author</x-jet-label>
                <input type="text" id="author" wire:model.defer="author" placeholder="{{ Auth::user()->name }}" class="flex-none w-full border-none rounded-lg focus:ring focus:ring-sky-200 text-sm"/>
                <x-jet-input-error for="author" class="mt-1" />
            </div>
            <div class="">
                <x-jet-button wire:click="save">Save Changes</x-jet-button>
            </div>
        </div>
    </div>
</div>
