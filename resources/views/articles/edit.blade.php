@extends('layout')

@section('title', 'Изменить статью')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение статьи
        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form method="POST" action={{route("articles").'/'.$article->id}}>

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="inputSlug">Символьный код</label>
                <input type="text" class="form-control" id="inputSlug" name="slug" value="{{old('slug', $article->slug)}}" placeholder="Введите символьный код">
            </div>
            <div class="form-group">
                <label for="inputTitle">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{old('title', $article->title)}}" placeholder="Введите название статьи">
            </div>
            <div class="form-group">
                <label for="inputBody">Описание статьи</label>
                <input type="text" class="form-control" id="inputBody" name="body" value="{{old('body', $article->body)}}" placeholder="Введите описание статьи">
            </div>
            <button type="submit" class="btn btn-primary">Обновить статью</button>
        </form>

        <form method="POST" action={{route("articles").'/'.$article->id}}>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Удалить статью</button>
        </form>

    </div>

@endsection