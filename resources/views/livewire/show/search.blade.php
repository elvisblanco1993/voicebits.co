<div>
    <div class="flex items-center" x-data="{searchDialog: false}" x-cloak>
        <button @click="searchDialog = true">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
        <div x-show="searchDialog" x-trap="searchDialog" tabindex="-1" class="bg-white/30 backdrop-blur overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full inset-0 h-modal h-full">
            <div class="relative max-w-md mx-auto h-full md:h-auto my-40" @click.outside="searchDialog = false">
                <div class="w-full mx-auto">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">{{ __("Search podcasts") }}</label>
                    <div class="relative w-full max-w-lg transform px-4 transition-all opacity-100 scale-100">
                        <div class="overflow-hidden rounded-md bg-white shadow-md">
                            <div class="relative border-b">
                                <input wire:keyup="search" wire:model="term"
                                    class="block w-full appearance-none bg-transparent border-0 py-4 pl-4 pr-12 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6"
                                    style="caret-color: rgb(107, 114, 128);" placeholder="Search podcasts" aria-label="Search articles" role="combobox" type="search" aria-expanded="false" tabindex="0"
                                >
                                <svg class="pointer-events-none absolute top-4 right-4 h-6 w-6 fill-slate-400" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.47 21.53a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-9.97-4.28a6.75 6.75 0 0 1-6.75-6.75h-1.5a8.25 8.25 0 0 0 8.25 8.25v-1.5ZM3.75 10.5a6.75 6.75 0 0 1 6.75-6.75v-1.5a8.25 8.25 0 0 0-8.25 8.25h1.5Zm6.75-6.75a6.75 6.75 0 0 1 6.75 6.75h1.5a8.25 8.25 0 0 0-8.25-8.25v1.5Zm11.03 16.72-5.196-5.197-1.061 1.06 5.197 5.197 1.06-1.06Zm-4.28-9.97c0 1.864-.755 3.55-1.977 4.773l1.06 1.06A8.226 8.226 0 0 0 18.75 10.5h-1.5Zm-1.977 4.773A6.727 6.727 0 0 1 10.5 17.25v1.5a8.226 8.226 0 0 0 5.834-2.416l-1.061-1.061Z"></path>
                                </svg>
                            </div>

                            @if ($results)
                                @forelse ($results as $podcast)
                                    <a href="{{ route('show', ['show' => $podcast]) }}" class="py-2 px-4 text-sm text-slate-600 flex items-center justify-between hover:bg-slate-50">
                                        <span>{{ $podcast->name }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                                            <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                                        </svg>
                                    </a>
                                @empty
                                    @if ($term)
                                        <p class="py-2 px-4 text-sm text-slate-600">No results found.</p>
                                    @else
                                        <p class="py-2 px-4 text-sm text-slate-600">Start typing to search...</p>
                                    @endif
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
