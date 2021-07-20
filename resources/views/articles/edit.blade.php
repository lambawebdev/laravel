@extends('layout')

@section('title', 'Изменить статью')

@section('content')

    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение статьи
        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form method="POST" action="{{ route("articles.article", $article->id) }}">

            @csrf
            @method('PATCH')

            @include('articles.input')

            <div class="form-group">
                <label for="inputTags">Теги</label>
                <input type="text"
                       class="form-control"
                       id="inputTags"
                       name="tags"
                       value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}">
            </div>



            <button type="submit" class="btn btn-primary">Обновить статью</button>
        </form>

        <form method="POST" action="{{ route("articles.article", $article->id) }}">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Удалить статью</button>
        </form>

    </div>

@endsection