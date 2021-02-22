@extends('layout')

@section('title', $article->title)

@section('content')

    <div class="col-md-8 blog-main">
        <a href="{{route('articles').'/'.$article->id.'/edit'}}">Изменить</a>
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->title }}
        </h3>

        {{ $article->body }}
        <hr>
        <a href="{{route('articles')}}">Вернутся к списку статей</a>

    </div>

@endsection





