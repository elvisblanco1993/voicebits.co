<div>
    <p class="text-xl font-semibold text-slate-900">Episode breakdown</p>

    <div class="mt-2 relative overflow-x-auto shadow     sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Episode
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published at
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Downloads
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($episodes as $episode)
                    <tr @class(['bg-white hover:bg-gray-50', 'border-b' => !$loop->last])>
                        <td class="px-6 py-4">
                            {{ $episode->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ Carbon\Carbon::parse($episode->created_at)->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            {{ $episode->plays_count }}
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
