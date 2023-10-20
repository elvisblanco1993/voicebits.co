<div>
    {{-- Podcast Menu --}}
    @livewire('submenu')

    <div class="py-6">
        <div class="sm:flex items-center justify-between">
        <x-input type="search" wire:model.live="search" placeholder="Search episodes by title" class="w-full sm:w-1/3"/>
            @can('upload_episodes', $podcast)
                <a href="{{ route('podcast.episode.create') }}" class="btn-link mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    <span class="ml-2">New episode</span>
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
                            Length
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Published at
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
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
                                {{  ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}
                            </td>
                            <td class="py-4 px-6">
                                {{ Carbon\Carbon::parse($episode->published_at)->format("M d, Y") }}
                            </td>
                            <td class="py-4 px-6">
                                @if (!$episode->published_at || $episode->published_at > now())
                                    <span class="text-xs font-medium text-slate-600 bg-slate-200 px-3 py-1 rounded-lg uppercase tracking-wider">{{__("Draft")}}</span>
                                @else
                                    <span class="text-xs font-medium text-green-600 bg-green-200 px-3 py-1 rounded-lg uppercase tracking-wider">{{__("Published")}}</span>
                                @endif
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
