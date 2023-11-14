@extends('website.layout')
@section('content')
    <main class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <article class="max-w-full prose dark:prose-invert">
            {!! Str::markdown(File::get(resource_path('views/website/markdown/about.md'))) !!}
        </article>
    </main>
@endsection
