@extends('layout')

@section('title', $news->title)

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $news->title }}
        </h3>

        {{ $news->body }}

        <hr>
        @admin
        <a href="{{route('news.edit', $news->id)}}">Редактировать новость</a>
        @endadmin

        <hr>
        <a href="{{route('news')}}">Вернутся к списку новостей</a>

    </div>

@endsection



