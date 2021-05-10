@extends('layout')

@section('title', 'Список статей')

@section('content')


    @include('layout.popup')

    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список статей
        </h3>


    @foreach($articles as $article)
        @include('articles.item')
    @endforeach


        <nav class="blog-pagination">

            {{ $articles->links() }}

{{--            <a class="btn btn-outline-primary" href="#">Older</a>--}}
{{--            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
        </nav>
    </div>

@endsection