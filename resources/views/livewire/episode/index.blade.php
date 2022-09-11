<div>
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('layouts.podcast-menu')
        <div class="mt-10 flex items-center justify-between">
            <x-jet-input type="search" wire:model="search" placeholder="Search by name"/>
            <a href="{{ route('episode.create', ['show' => $show]) }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                >New Episode</a>
        </div>

        <div class="mt-4 prose max-w-full">
            <table class="table-auto w-full">
                <thead class="text-sm text-slate-500">
                <tr>
                    <th>Name</th>
                    <th>Length</th>
                    <th>Published At</th>
                    <th>Status</th>
                    <th class="sr-only">Options</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($episodes as $episode)
                        <tr class="">
                            <td>
                                {{ $episode->title }}
                            </td>
                            <td>{{  ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}</td>
                            <td>{{ Carbon\Carbon::parse($episode->published_at)->format("M d, Y") }}</td>
                            <td>
                                @if (!$episode->published_at || $episode->published_at > now())
                                    <span class="text-xs font-medium text-slate-600 bg-slate-200 px-3 py-1 rounded-lg uppercase tracking-wider">{{__("Draft")}}</span>
                                @else
                                    <span class="text-xs font-medium text-green-600 bg-green-200 px-3 py-1 rounded-lg uppercase tracking-wider">{{__("Published")}}</span>
                                @endif
                            </td>
                            <td class="flex items-center justify-end space-x-3">
                                <a href="{{ route('episode.edit', ['show' => $episode->podcast_id, 'episode' => $episode->id]) }}" class="uppercase text-xs">Edit</a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>

            {{ $episodes->links() }}
        </div>
    </div>
</div>
