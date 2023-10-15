<div>
    @livewire('submenu')

    {{-- Subscription Section --}}
    <div class="py-6">
        <div class="px-6 py-8 w-full bg-white rounded-lg shadow">
            @if ($podcast->episodes->count() < 1)
                <h2 class="text-2xl font-bold">Want to add subscribers?</h2>
                <p class="mt-2 text-slate-600">Please complete your podcast launch requirements first. This ensures we have a valid podcast website to share with your subscribers before you send out any invitations.</p>

                <a href="{{ route('podcast.dashboard') }}" class="mt-4 btn-link">Finish podcast setup -></a>
            @else
                @livewire('subscriber.invite.bulk', ['podcast' => $podcast])

                <div class="mt-6 border-t border-t-slate-200"></div>

                <div class="mt-6 sm:flex items-start gap-4">
                    <div class="h-16 w-16 aspect-square flex items-center justify-center rounded-full bg-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-slate-600 w-8 h-8">
                            <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 00-5.304 0l-4.5 4.5a3.75 3.75 0 001.035 6.037.75.75 0 01-.646 1.353 5.25 5.25 0 01-1.449-8.45l4.5-4.5a5.25 5.25 0 117.424 7.424l-1.757 1.757a.75.75 0 11-1.06-1.06l1.757-1.757a3.75 3.75 0 000-5.304zm-7.389 4.267a.75.75 0 011-.353 5.25 5.25 0 011.449 8.45l-4.5 4.5a5.25 5.25 0 11-7.424-7.424l1.757-1.757a.75.75 0 111.06 1.06l-1.757 1.757a3.75 3.75 0 105.304 5.304l4.5-4.5a3.75 3.75 0 00-1.035-6.037.75.75 0 01-.354-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Allow subscribers to signup themselves</p>
                        <p class="mt-2 text-sm text-slate-600">Share the link below with your future audience. They will be able to signup with their email address. You can protect this link with a password, and can safelist email domains in your show settings.</p>

                        <div class="mt-4 flex items-center gap-2">
                            <div id="podcasturl" class="px-4 py-2 w-auto border border-slate-200 text-slate-700 rounded-md text-xs">{{ route('private.podcast.subscribe', ['url' => $podcast->url]) }}</div>
                            <x-button id="copybtn" onclick="copyToClipboard()">Copy</x-button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if ($subscribers->count() > 0)
        <div class="mt-6 px-6 py-8 w-full bg-white rounded-lg shadow">
            <div class="max-w-full prose">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th>Subscriber</th>
                            <th>Downloads</th>
                            <th class="flex justify-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscribers as $subscriber)
                            <tr class="hover:bg-slate-100">
                                <td>{{ $subscriber->email }}</td>
                                <td>923</td>
                                <td class="flex justify-end">
                                    <div x-data="{show: false}" class="relative">
                                        <button @click="show = !show">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>

                                        <div class="absolute z-30 mt-2 w-48 rounded-lg shadow-lg origin-top-right right-0" x-show="show" @click.outside="show = false" x-focus x-cloak>
                                            <div class="rounded-lg ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                                <div class="block px-4 py-2 text-xs text-gray-400">Manage subscriber</div>
                                                @livewire('subscriber.actions.analytics', ['subscriber' => $subscriber], key('analytics'.$subscriber->id))
                                                @livewire('subscriber.actions.send-link', ['subscriber' => $subscriber], key('sendlink'.$subscriber->id))
                                                @livewire('subscriber.actions.delete', ['subscriber' => $subscriber], key('remove'.$subscriber->id))
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div @class(['mt-6' => $subscribers->count() > 10])>
                {{ $subscribers->links() }}
            </div>
        </div>
    @endif
    <div class="pt-12"></div>

    {{-- Stripts --}}
    <script>
        const copyToClipboard = () => {
            const text = document.getElementById('podcasturl').innerHTML;
            navigator.clipboard
                .writeText(text)
                .then(() => {
                    document.getElementById('copybtn').innerHTML = 'Copied &#10003;'
                })
                .catch((err) => {
                console.error(`Error copying linkd url to clipboard: ${err}`);
            });
        };
    </script>
</div>
