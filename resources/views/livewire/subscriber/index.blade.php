<div>
    @livewire('submenu')

    <div class="py-6">
        <div class="px-6 py-8 w-full bg-white rounded-lg shadow">

            @if ($podcast->episodes->count() < 1)
                <h2 class="text-2xl font-bold">Want to add subscribers?</h2>
                <p class="mt-2 text-slate-600">Please complete your podcast launch requirements first. This ensures we have a valid podcast website to share with your subscribers before you send out any invitations.</p>

                <a href="{{ route('podcast.dashboard') }}" class="mt-4 btn-link">Finish podcast setup -></a>
            @else
                <div class="sm:flex items-start gap-4">
                    <div class="h-16 w-16 aspect-square flex items-center justify-center rounded-full bg-cyan-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-cyan-700 w-8 h-8">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="text-lg font-semibold">Add subscribers using their emails</p>
                        <p class="mt-2 text-sm text-slate-600">Enter the email addresses separated by a comma and we will get all emails that are not subscribed yet to review in the next step. If you have a CSV file without headers, you can open it with a text editor and copy its contents here.</p>

                        <x-textarea rows="4" class="mt-4 w-full"></x-textarea>

                        <x-button class="mt-4">Submit and review</x-button>
                    </div>
                </div>

                <div class="mt-6 border-t border-t-slate-200"></div>

                <div class="mt-6 sm:flex items-start gap-4">
                    <div class="h-16 w-16 aspect-square flex items-center justify-center rounded-full bg-cyan-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-cyan-700 w-8 h-8">
                            <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Allow subscribers to signup themselves</p>
                        <p class="mt-2 text-sm text-slate-600">Share the link below with your future audience. They will be able to signup with their email address. You can protect this link with a password, and can safelist email domains in your show settings.</p>

                        <div class="mt-4 flex items-center gap-2">
                            <div class="px-4 py-2 w-auto border border-slate-200 text-slate-700 rounded-md text-xs">{{ route('private.podcast.subscribe', ['url' => $podcast->url]) }}</div>
                            <x-button>Copy</x-button>
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
