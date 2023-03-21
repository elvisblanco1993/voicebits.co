<div>
    {{-- Podcast Menu --}}
    @livewire('submenu')

    <div class="py-6">
        <div class="flex items-center justify-between">
            <div class="text-2xl font-bold">Episodes</div>
            {{-- <x-input type="search" wire:model="search" placeholder="Search episode" class="w-1/2"/> --}}
            @can('upload_episodes', $podcast)
                <a href="{{ route('podcast.episode.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                >Upload</a>
            @endcan
        </div>
        <div class="mt-4 overflow-x-auto shadow rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
