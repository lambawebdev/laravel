@php
    $tags = $tags ?? collect();
@endphp


@if($tags->isNotEmpty())
    <div class="">
        @foreach($tags as $tag)
            <a href="{{ route('news.tags', $tag->getRouteKey()) }}" class="badge badge-secondary">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
