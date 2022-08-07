<div>
    <div class="w-full py-12 px-8 bg-white rounded-lg shadow">
        <div class="text-base font-semibold text-slate-500 border-b pb-2">Overall initial reproductions</div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 30 days</div>
            <div class="text-xl font-bold">{{ $thirty_days ?? 0 }}</div>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 60 days</div>
            <div class="text-xl font-bold">{{ $sixty_days ?? 0 }}</div>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 90 days</div>
            <div class="text-xl font-bold">{{ $ninety_days ?? 0 }}</div>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm font-semibold text-slate-500">First 120 days</div>
            <div class="text-xl font-bold">{{ $hundred_twenty_days ?? 0 }}</div>
        </div>
    </div>
</div>
