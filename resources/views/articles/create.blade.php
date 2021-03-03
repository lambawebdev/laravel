@extends('layout')

@section('title', 'Создать статью')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">

        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form method="post" action="{{route("articles.store")}}">

            @csrf

            @include('articles.input', ['article' => new App\Models\Article()])

            <button type="submit" class="btn btn-primary">Добавить статью</button>
        </form>

    </div>

@endsection