<div>
    <div class="w-full py-12 px-8 bg-white rounded-lg shadow">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-xs tracking-wide font-mono font-semibold text-slate-400">Website <span class="ml-2">{{ $from_website }}</span></div>
                <div class="text-xs tracking-wide font-mono font-semibold text-slate-400">RSS Players <span class="ml-2">{{ $from_third_parties }}</span></div>
            </div>
            <div class="text-right">
                <div class="text-2xl font-bold">{{ $totalPlays }}</div>
                <div class="text-sm font-semibold text-slate-500">Overall plays</div>
            </div>
        </div>
    </div>
</div>
