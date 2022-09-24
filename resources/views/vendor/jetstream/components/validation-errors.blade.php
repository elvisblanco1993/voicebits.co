@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600 rounded-lg border border-red-300 my-4 p-4 bg-red-50">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li class="inline-flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <span>{{ $error }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif
