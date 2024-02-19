<div>
    <div class="py-12 max-w-5xl mx-auto">
        @if (Auth::user()->hasPendingInvitations())
            @forelse (DB::table('podcast_invitations')->where('email', Auth::user()->email)->get() as $invitation)
                <div class="mb-4 w-full px-4 py-1.5 text-sm bg-slate-200 text-center rounded-full border border-slate-300">
                    <span class="inline-flex space-x-1">
                        <span>You have been invited to join <strong>{{ App\Models\Podcast::findOrFail($invitation->podcast_id)->name }}</strong> as a team member.</span>
                        @livewire('show.user.accept-invitation', ['podcast' => $invitation->podcast_id, 'user' => $invitation->email])
                    </span>
                </div>
            @empty
            @endforelse
            <h3 class="text-center font-bold">OR</h3>
        @endif

        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-lg bg-gradient-to-tr from-slate-500 to-slate-900 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <div class="">
                <h1 class="text-2xl font-bold text-slate-700">{{__("Create a podcast")}}</h1>
                <p class="mt-1 text-slate-600">{{__("Start by adding some basic information. You can always change the details later.")}}</p>
            </div>
        </div>

        <div class="mt-6 py-6 px-4 sm:px-6 rounded-lg shadow bg-white">
            <form wire:submit="save">
                @csrf
                <div>
                    <x-label for="name">{{ __("Podcast name") }} <span class="text-red-600">*</span></x-label>
                    <x-input type="text" id="name" wire:model.live="name" class="mt-1 w-full" placeholder="The title of your show" autofocus/>
                    <x-input-error for="name" class="text-sm text-red-600 mt-2"/>
                </div>
                <div class="mt-6">
                    <x-label for="description">{{ __("Description") }} <span class="text-red-600">*</span></x-label>
                    <x-textarea wire:model.live="description" id="description" rows="6" class="w-full"
                        placeholder="Write a description for your show. We recommend one or two sentences."
                    ></x-textarea>
                    <x-input-error for="description" class="text-sm text-red-600 mt-2"/>
                </div>
                <div class="mt-6 grid grid-cols-6 gap-8 items-center">
                    <div class="col-span-2 md:col-span-1">
                        @if($cover)
                            <img src="{{ $cover->temporaryUrl() }}" class="w-full rounded-lg shadow aspect-square object-center object-cover">
                        @else
                            <div class="flex-none w-full h-full aspect-square rounded-lg bg-indigo-50 border border-indigo-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-indigo-200">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="col-span-6 md:col-span-5">
                        <div class="flex items-center">
                            <p class="text-sm font-boldblock font-medium text-gray-700">Podcast artwork</p>
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
                <div class="mt-6 grid grid-cols-2 gap-8">
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="category">{{ __("Podcast category") }} <span class="text-red-600">*</span></x-label>
                        <select wire:model.live="category" id="category" class="input">
                            @include('layouts.partials.podcast-categories')
                        </select>
                        <x-input-error for="category" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="col-span-2">
                        <x-label value="Podcast type" />
                        <label for="episodic" class="mt-1 flex items-center space-x-2 text-sm font-medium text-slate-600">
                            <input type="radio" name="type" wire:model.live="type" id="episodic" value="episodic" class="cursor-pointer">
                            <span>{{ __("Episodic (most common) - episodes are listed newest to oldest") }}</span>
                        </label>
                        <label for="serial" class="mt-1 flex items-center space-x-2 text-sm font-medium text-slate-600">
                            <input type="radio" name="type" wire:model.live="type" id="serial" value="serial" class="cursor-pointer">
                            <span>{{ __("Serial - episodes are listed oldest to newest") }}</span>
                        </label>
                        <x-input-error for="type" class="text-sm text-red-600 mt-2"/>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-8">
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="language">{{ __("Spoken language") }} <span class="text-red-500">*</span></x-label>
                        <select wire:model.live="language" id="language" class="input">
                            @include('layouts.partials.podcast-languages')
                        </select>
                        <x-input-error for="language" class="text-sm text-red-600 mt-2"/>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <x-label for="timezone">{{ __("Publishing timezone") }} <span class="text-red-500">*</span></x-label>
                        <select wire:model.live="timezone" id="timezone" class="input">
                            @include('layouts.partials.timezones-list')
                        </select>
                        <x-input-error for="timezone" class="text-sm text-red-600 mt-2"/>
                    </div>
                </div>
                <div class="mt-6">
                    <x-label for="author">{{ __("Podcast author") }} <span class="text-red-500">*</span></x-label>
                    <x-input type="text" id="author" wire:model.live="author" class="mt-1 w-full"/>
                    <x-input-error for="author" class="text-sm text-red-600 mt-2"/>
                </div>
                <div class="mt-6">
                    <x-label for="copyright" value="Copyright" />
                    <x-input type="text" id="copyright" wire:model.live="copyright" class="mt-1 w-full" placeholder="i.e. &copy; {{ date('Y') . ' ' . $author }}"/>
                </div>

                <div class="mt-6 border-t"></div>

                <div class="mt-6">
                    <x-label for="visibility" class="flex items-center space-x-2">
                        <x-checkbox id="visibility" wire:model.live="visibility"></x-checkbox>
                        <span>Make this podcast private 🔒</span>
                    </x-label>

                    <p class="mt-1 text-sm text-slate-600">Set this podcast to private if you plan to share it exclusively with your subscribers.</p>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('podcast.catalog') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-amber-300 focus:ring focus:ring-amber-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                    >{{ __("Cancel") }}</a>
                    <x-button type="submit" class="ml-4">{{ __("Create show") }}</x-button>
                </div>
            </form>
        </div>
    </div>
</div>
