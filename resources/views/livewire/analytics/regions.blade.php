<div>
    <p class="text-xl font-semibold text-slate-900">Downloads per region</p>

    <div class="mt-2 relative overflow-x-auto shadow     sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Country
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Region
                    </th>
                    <th scope="col" class="px-6 py-3">
                        City
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Overall Downloads
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dbdata as $data)
                    <tr @class(['bg-white hover:bg-emerald-50', 'border-b' => !$loop->last])>
                        <td class="px-6 py-4">
                            {{ $data['country'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data['region'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data['city'] }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            {{ $data['total'] }}
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
