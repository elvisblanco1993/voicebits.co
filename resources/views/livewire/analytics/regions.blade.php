<div class="w-full  max-w-full prose">

    <table class="w-full table-fixed text-left">
        <thead>
            <tr class="text-sm font-normal text-slate-600">
                <th>{{ __("Country") }}</th>
                <th>{{ __("Region") }}</th>
                <th>{{ __("City") }}</th>
                <th class="text-right">{{ __("Downloads") }}</th>
            </tr>
        </thead>

        <tbody class="mt-4">
            @forelse ($dbdata as $data)
                <tr class="hover:bg-emerald-100 hover:text-emerald-700 py-4">
                    <td>{{ $data['country'] }}</td>
                    <td>{{ $data['region'] }}</td>
                    <td>{{ $data['city'] }}</td>
                    <td class="text-right">{{ $data['total'] }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
