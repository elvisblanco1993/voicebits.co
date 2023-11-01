@extends('website.layout')
@section('content')
    <main class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-slate-800">
        <article class="max-w-full pamber pamber-lg pamber-amber dark:pamber-invert">
            {!! Str::markdown(File::get(resource_path('views/website/markdown/about.md'))) !!}
        </article>
    </main>
@endsection
