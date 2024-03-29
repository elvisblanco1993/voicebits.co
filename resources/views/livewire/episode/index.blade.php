<div>
    {{-- Podcast Menu --}}
    @livewire('submenu')

    <div class="py-6">
        <div class="space-y-3 sm:space-y-0 sm:flex items-center justify-between">
        <x-input type="search" wire:model.live="search" placeholder="Search episodes by title" class="w-full sm:w-1/3"/>
            @can('upload_episodes', $podcast)
                <a href="{{ route('podcast.episode.create') }}" class="flex items-center px-5 py-2 rounded-md bg-amber-300 hover:bg-amber-200 font-medium transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M9.25 13.25a.75.75 0 001.5 0V4.636l2.955 3.129a.75.75 0 001.09-1.03l-4.25-4.5a.75.75 0 00-1.09 0l-4.25 4.5a.75.75 0 101.09 1.03L9.25 4.636v8.614z" />
                        <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                    </svg>
                    <span class="ml-2">Add episode</span>
                </a>
            @endcan
        </div>
        <div class="mt-4 overflow-x-auto shadow rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-white border-b">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Title
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Published at
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($episodes as $episode)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ $episode->title }}
                            </th>

                            <td class="py-4 px-6">
                                @if (!$episode->published_at && !$episode->scheduled_for)
                                    <span class="text-xs font-medium text-slate-600 bg-slate-200 px-2 py-0.5 rounded-full uppercase tracking-wider">{{__("Draft")}}</span>
                                @elseif ($episode->scheduled_for)
                                    <span class="text-xs font-medium text-pink-600 bg-pink-200 px-2 py-0.5 rounded-full uppercase tracking-wider">{{__("Scheduled")}}</span>
                                @else
                                    <span class="text-xs font-medium text-green-600 bg-green-200 px-2 py-0.5 rounded-full uppercase tracking-wider">{{__("Published")}}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                {{ ($episode->published_at) ? Carbon\Carbon::parse($episode->published_at)->format("M d, Y") : '-' }}
                            </td>
                            <td class="py-4 px-6 text-right">
                                @can('edit_episodes', $episode->podcast)
                                    <a href="{{ route('podcast.episode.edit', ['episode' => $episode->id]) }}" class="uppercase text-xs">Edit</a>
                                @endcan
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $episodes->links() }}
        </div>
    </div>
</div>
