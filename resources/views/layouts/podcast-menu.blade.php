<div class="grid grid-cols-6 gap-8">
    <div class="col-span-6 sm:col-span-1">
        @if ($podcast->cover)
            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full aspect-square object-center object-cover rounded-lg shadow-lg">
        @else
        <div class="w-full aspect-square bg-blue-100 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-500" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </div>
        @endif
    </div>

    <div class="col-span-6 sm:col-span-5 flex flex-col justify-between">
        <div class="text-2xl font-bold">{{ $podcast->name }}</div>

        <div class="flex items-center justify-between border-b">
            <div class="flex items-center m-0 overflow-auto">
                <a href="{{ route('show', ['show' => $podcast->id]) }}" @class([
                    'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('show')
                ])>Dashboard</a>
                <a href="{{ route('episodes', ['show' => $podcast->id]) }}" @class([
                    'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 hover:text-blue-600 transition-all',
                    'text-blue-600' => request()->routeIs('episodes')
                ])>Episodes</a>
                @if ($podcast->isReadyToDistribute())
                    <a href="{{ route('show.social', ['show' => $podcast->id]) }}" @class([
                        'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('show.social')
                    ])>Social</a>
                    <a href="{{ route('show.distribution', ['show' => $podcast->id]) }}" @class([
                        'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('show.distribution')
                    ])>Distribution</a>

                    {{--
                        Website feature
                        This feature is currently in beta and is not available for production yet.
                    --}}
                    @if (config('app.env') === 'local')
                        <a href="{{ route('show.website', ['show' => $podcast->id]) }}" @class([
                            'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 hover:text-blue-600 transition-all',
                            'text-blue-600' => request()->routeIs('show.website')
                        ])>Website</a>
                    @endif
                @endif
            </div>
            <div class="m-0">
                <a href="{{ route('show.settings', ['show' => $podcast->id]) }}"
                    @class([
                        'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 hover:text-blue-600 transition-all',
                        'text-blue-600' => request()->routeIs('show.settings')
                    ])>Settings</a>
            </div>
        </div>
    </div>
</div>
