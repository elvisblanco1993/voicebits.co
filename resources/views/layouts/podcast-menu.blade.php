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

        <div class="sm:flex items-center justify-between border-b">
            <div class="sm:flex items-center m-0">
                <a href="{{ route('show', ['show' => $podcast->id]) }}" @class([
                    'block w-full text-center text-sm font-semibold text-slate-600 p-3 border-b-4 border-slate-100 hover:border-b-blue-500 hover:text-blue-500 transition-all',
                    'border-b-2 border-b-blue-500 text-blue-600' => request()->routeIs('show')
                ])>Dashboard</a>
                <a href="{{ route('episodes', ['show' => $podcast->id]) }}" @class([
                    'block w-full text-center text-sm font-semibold text-slate-600 p-3 border-b-4 border-slate-100 hover:border-b-blue-500 hover:text-blue-500 transition-all',
                    'border-b-2 border-b-blue-500 text-blue-600' => request()->routeIs('episodes')
                ])>Episodes</a>
                @if ($podcast->isReadyToDistribute())
                    <a href="{{ route('show.social', ['show' => $podcast->id]) }}" @class([
                        'block w-full text-center text-sm font-semibold text-slate-600 p-3 border-b-4 border-slate-100 hover:border-b-blue-500 hover:text-blue-500 transition-all',
                        'border-b-2 border-b-blue-500 text-blue-600' => request()->routeIs('show.social')
                    ])>Social</a>
                    <a href="{{ route('show.distribution', ['show' => $podcast->id]) }}" @class([
                        'block w-full text-center text-sm font-semibold text-slate-600 p-3 border-b-4 border-slate-100 hover:border-b-blue-500 hover:text-blue-500 transition-all',
                        'border-b-2 border-b-blue-500 text-blue-600' => request()->routeIs('show.distribution')
                    ])>Distribution</a>
                    <a href="{{ route('show.website', ['show' => $podcast->id]) }}" @class([
                        'block w-full text-center text-sm font-semibold text-slate-600 p-3 border-b-4 border-slate-100 hover:border-b-blue-500 hover:text-blue-500 transition-all',
                        'border-b-2 border-b-blue-500 text-blue-600' => request()->routeIs('show.website')
                    ])>Website</a>
                @endif
            </div>
            <div class="m-0">
                <a href="{{ route('show.settings', ['show' => $podcast->id]) }}"
                    @class([
                        'flex items-center w-full text-center text-sm font-semibold text-slate-600 p-3 border-b-4 border-slate-100 hover:border-b-blue-400 hover:text-blue-500 transition-all',
                        'border-b-2 border-b-blue-500 text-blue-600' => request()->routeIs('show.settings')
                    ])>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                    <span class="ml-3 hidden md:block">Podcast Settings</span>
                </a>
            </div>
        </div>
    </div>
</div>
