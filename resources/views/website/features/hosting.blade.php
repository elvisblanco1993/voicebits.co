@extends('website.layout')
@section('content')
    <main class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-slate-800">
        <article class="max-w-full prose prose-lg prose-teal dark:prose-invert">
            {!! Str::markdown(File::get(resource_path('views/website/markdown/hosting.md'))) !!}
        </article>
    </main>
@endsection
