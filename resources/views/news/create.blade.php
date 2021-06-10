@extends('layout')

@section('title', 'Создать статью')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">

        </h3>

        @include('layout.errors')

        @include('layout.success')

        <form method="post" action="{{route("news.store")}}">

            @csrf

            <div class="form-group">
                <label for="inputTitle">Название новости</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{old('title')}}" placeholder="Введите название новости">
            </div>
            <div class="form-group">
                <label for="inputBody">Описание новости</label>
                <textarea class="form-control" id="inputBody" rows="6" name="body"> {{old('body')}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="inputTags">Теги</label>
                <input type="text"
                       class="form-control"
                       id="inputTags"
                       name="tags"
                       value="{{ old('tags', $news->tags->pluck('name')->implode(',')) }}">
            </div>

            <button type="submit" class="btn btn-primary">Добавить новость</button>
        </form>

    </div>

@endsection