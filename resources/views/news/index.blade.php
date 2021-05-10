@extends('layout')

@section('title', 'Новости')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Новости
        </h3>

    @foreach($news as $item)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="{{ route('news.news', $item->id) }}">{{ $item->title }}</a></h2>
                <p class="blog-post-meta">{{ $item->created_at }}</p>

                {{ $item->body }}

            </div><!-- /.blog-post -->
    @endforeach

        <nav class="blog-pagination">

            {{ $news->links() }}

{{--            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
        </nav>
    </div>

@endsection