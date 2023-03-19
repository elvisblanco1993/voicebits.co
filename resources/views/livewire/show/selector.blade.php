<div class="col-span-12 py-4 border-b">
    @forelse ($podcasts as $podcast)
        {{$podcast->name}}
    @empty

    @endforelse
</div>
