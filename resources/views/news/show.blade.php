@extends('layout')

@section('title', $news->title)

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $news->title }}
        </h3>

        @include('news.tags', ['tags' => $news->tags])

        {{ $news->body }}

        <hr>
        <span>Добавить комментарий:</span>
        <form method="post" action="{{ route('news.comments', $news->id) }}">
            @csrf
            <div class="form-group">
                <input
                        class="form-control"
                        type="text"
                        placeholder="Введите комментарий"
                        value="{{ old('description') }}"
                        name="description"
                >
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
        <span>Список комментариев:</span>
        @include('layout.errors')
        @if ($news->comments->isNotEmpty())
            <ul class="list-group">
                @foreach($news->comments as $comment)
                    <li class="list-group-item">
                        {{ $comment->description }}
                        <p><span>Создан:</span>{{ $comment->created_at->diffForHumans() }}</p>
                        <p><span>Автор:</span> {{ $comment->user->name }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <hr>
        @admin
        <a href="{{route('admin.news.edit', $news->id)}}">Редактировать новость</a>
        @endadmin

        <hr>
        <a href="{{route('news')}}">Вернутся к списку новостей</a>

    </div>

@endsection



