<div>
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <h1 class="text-lg font-bold">Articles</h1>
        <div>
            <a href="{{ route('article.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
            >New Article</a>
        </div>
    </div>

    <div class="py-6 px-4 sm:px-6 lg:px-0">
        <x-input type="text" wire:model="search" placeholder="Search by title" class="w-full md:w-1/2"/>
        {{-- Content --}}
        <div class="mt-4 prose max-w-full">
            <table class="table-auto w-full">
                <thead class="text-sm text-slate-500">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th class="sr-only">Options</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr class="">
                            <td class="text-sm">
                                <a href="{{ route('blog.article', ['article' => $article->slug]) }}" target="_blank">{{ $article->title }}</a>
                            </td>
                            <td class="text-xs">
                                {{ $article->author }}
                            </td>
                            <td>
                                @if ($article->published_at)
                                    <span class="inline-block text-xs text-green-600 px-2 bg-green-200 rounded">Published</span>
                                    <span class="block text-xs">{{ date('Y/m/d \a\t h:i a', strtotime($article->published_at)) }}</span>
                                @else
                                    <span class="inline-block text-xs text-slate-600 px-2 bg-slate-200 rounded">Draft</span>
                                    <span class="block text-xs">{{ date('Y/m/d \a\t h:i a', strtotime($article->created_at)) }}</span>
                                @endif
                            </td>
                            <td class="flex items-center justify-end space-x-3">
                                @livewire('article.publish', ['article' => $article->id], key('pub-' . $article->id))
                                <a href="{{ route('article.edit', ['article' => $article->id]) }}" class="uppercase text-xs text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                        <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                    </svg>
                                </a>
                                @livewire('article.delete', ['article' => $article->id], key('del-' . $article->id))
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>

            {{ $articles->links() }}
        </div>
    </div>
</div>
