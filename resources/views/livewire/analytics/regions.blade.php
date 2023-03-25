<div>
    <div class="flex items-center justify-between gap-8 text-sm font-normal text-slate-600">
        <p class="text-slate-600 flex items-center space-x-2">{{ __("Most popular at") }}</p>
        <p>{{ __("Downloads") }}</p>
    </div>

    @forelse ($downloads as $device => $data)
        <div @class([
            'flex items-center justify-between cap-8 -mx-4 px-4 py-2 hover:bg-emerald-100 hover:text-emerald-700 text-sm text-slate-800',
            'mt-4' => $loop->first
        ])>
            <p>{{ $device }}</p>
            <p>{{ $data->count('count') }}</p>
        </div>
    @empty
    @endforelse
</div>
